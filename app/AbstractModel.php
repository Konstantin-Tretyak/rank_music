<?php

namespace App;

class AbstractModel extends \Illuminate\Database\Eloquent\Model
{
     protected $joinedRelations = [];
    public function scopeJoinRelation($query, $relation_name)
    {
        // works only for BelongsTo
        if (!isset($this->joinedRelations[$relation_name])) {
            $relation = $this->$relation_name();
            $relatedTable = $relation->getRelated()->getTable();
            $relatedKey = $relation->getOtherKey();
            $localKey = $relation->getForeignKey();
            $localTable = $this->getTable();

            $query->select($localTable.".*");

            foreach (\Schema::getColumnListing($relatedTable) as $related_column) {
                $query->addSelect(new \Illuminate\Database\Query\Expression("`$relatedTable`.`$related_column` AS `$relation_name-$related_column`"));
            }

            $this->joinedRelations[$relation_name] = $query->join($relatedTable, "$localTable.$localKey" , '=', "$relatedTable.$relatedKey");
        }

        return $this->joinedRelations[$relation_name];
    }

    public function scopeOrderByRelation($query, $relation_name, $related_column, $direction = 'asc') {
        $relatedTable = $this->$relation_name()->getRelated()->getTable();
        return $this->scopeJoinRelation($query, $relation_name)->orderBy("$relatedTable.$related_column" , $direction);
    }

    public function initRelation($relation_name)
    {
        $attrs = [];
        foreach ($this->getAttributes() as $parentAttr => $value) {
            $pos = strpos($parentAttr, $relation_name.'-');
            if ($pos === 0) {
                $attr = substr($parentAttr, strlen($relation_name.'-'));
                $attrs[$attr] = $value;
            }
        }

        if ($attrs) {
            $model = $this->$relation_name()->getRelated()->setRawAttributes($attrs);
            $this->setRelation($relation_name, $model);
        }
        else {
            throw new Exception("Relation '$relation_name' is absent");
        }

        return $this;
    }
}
