@extends('layout')

@section('content')

    <div class="col-md-12">
        <div class="left_field col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingNull">
                    <a class="galka-button galka-button panel-button btn btn-primary" data-toggle="collapse" data-target="#collapseNull" aria-expanded="true" aria-controls="collapseNull">
                        Фильтр
                        <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                    </a>
                </div>
                <form class="filter" method="GET">
                    <div id="collapseNull" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNull">
                        <div class="panel-body" id="headingNull">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <a class="galka-button panel-button btn btn-default"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Жанр
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        @foreach ($genres as $genre)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                                        @if(!empty($filters['genres']))
                                                            @foreach ($filters['genres'] as $filter)
                                                                @if($filter == $genre->id)
                                                                    checked="checked"
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    />
                                                    {{ $genre->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                      </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <a class="galka-button panel-button btn btn-default" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Страна
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                        <div class="select_all">
                                             <div>
                                                <input type="checkbox">Выбрать всё
                                            </div>
                                        </div>

                                        <div class="country_list">
                                            @foreach ($countries as $country)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="countries[]" value="{{ $country->id }}"
                                                            @if(!empty($filters['countries']))
                                                                @foreach ($filters['countries'] as $filter)
                                                                    @if($filter == $country->id)
                                                                        checked="checked"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        />
                                                        {{ $country->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>


                                      </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <a class="galka-button panel-button btn btn-default" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Год
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <span class='padding-10'>Диапозон</span>
                                        <div class="panel-body padding-10">
                                            <span>с:</span>
                                            <select class="select_range" onchange="$('.select_decade, .select_century').val('')" name="range_year[years][min]">
                                                <option value
                                                    @if( !isset($filters['range_year']) )
                                                        selected="selected"
                                                    @endif
                                                >
                                                    -
                                                </option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}"
                                                        @if(  isset($filters['range_year']['min']) && $filters['range_year']['min'] == $year)
                                                            selected="selected"
                                                        @endif
                                                    >
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <span>до:</span>
                                            <select class="select_range" onchange="$('.select_decade, .select_century').val('')" name="range_year[years][max]">
                                                <option value
                                                    @if( !isset($filters['range_year']) )
                                                        selected="selected"
                                                    @endif
                                                >
                                                    -
                                                </option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}"
                                                        @if(  isset($filters['range_year']['max']) && $filters['range_year']['max'] == $year)
                                                            selected="selected"
                                                        @endif
                                                    >
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class='padding-10'>По десятилетиям</span>
                                        <div class="panel-body padding-10">
                                            <select class="select_decade" onchange="$('.select_range, .select_century').val('')" name="decade">
                                                <option value
                                                    @if( !isset($filters['decade']) )
                                                        selected="selected"
                                                    @endif
                                                >
                                                    -
                                                </option>
                                                @foreach($decades as $year)
                                                    <option value="{{ $year }}"
                                                        @if( isset($filters['decade']) && $filters['decade'] == $year)
                                                            selected="selected"
                                                        @endif
                                                    >
                                                        {{ $year }}-е
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <span class='padding-10'>По векам</span>
                                        <div class="panel-body padding-10">
                                            <select class="select_century" onchange="$('.select_range, .select_decade').val('')" name="century">
                                                <option value
                                                    @if( !isset($filters['century']) )
                                                        selected="selected"
                                                    @endif
                                                >
                                                    -
                                                </option>
                                                @foreach($centurys as $year)
                                                    <option value="{{ $year*100 - 100 }}"
                                                        @if( isset($filters['century']) && $filters['century'] == $year)
                                                            selected="selected"
                                                        @endif
                                                    >
                                                        {{ $year }}-ый
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <a class="galka-button panel-button btn btn-default" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                          Теги
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                      <div class="panel-body">
                                        <div class="select_all">
                                             <div>
                                                <input type="checkbox">Выбрать всё
                                            </div>
                                        </div>
                                        <div class="country_list">
                                            @foreach ($tags as $tag)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                            @if(!empty($filters['tags']))
                                                                @foreach ($filters['tags'] as $filter)
                                                                    @if($filter == $tag->id)
                                                                        checked="checked"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        />
                                                        {{ $tag->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary submit_filter">Искать</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="center_field col-md-7 col-sm-12">
            <div class="new_tag">
                <div class="tags">
                    <h3>Рейтинг лучших песен/ Результаты поиска</h3>
                </div>
            </div>

            @if(!$songs->total())
                <span>По данному запросу ничего не удалось найти</span>
            @else
                <div class="sort">
                    <form>
                        <label>
                            Сортировка
                        </label>
                        <select class="form-control" name="sort">
                            <option value="ranks" selected> По рейтингу </option>
                            <option value="name"> По названию </option>
                            <option value="artist"> По исполнителю </option>
                            <option value="composer"> По композитору </option>
                            <option value="duration"> По длительности </option>
                            <option value="year"> По году </option>
                            <option value="country"> По стране </option>
                        </select>
                        <button type="submit" class="btn btn-primary">Сортировать</button>
                    </form>
                </div>

                <ul class="song_list list-inline">
                    @foreach($songs as $song)
                        <li class="song">
                            <div class="song_information">
                                <div class="artist_and_rank">
                                    <img src="{{ $song->photo }}" class="img-responsive"/>
                                    <div class="action_song">
                                        <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                        </span>
                                         <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                        </span>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="{{ route('songs.show', $song->id) }}">
                                        {{ $song->name }}
                                    </a>
                                    <a href="Artist_Page.html">
                                        <p>
                                            {{ $song->performer->name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if($songs->lastPage() != 1)
                    {{ $songs->render() }}
                @endif
            @endif
        </div>

        <div class="right_field col-md-3 col-sm-12 col-xs-12">
            <div class="player_and_list">
                <div class="player row">
                    <div class="about_current_song row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <img src="foto\Rubber_Soul.jpg" class="artist_img">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div>
                                The Beatles
                            </div>
                            <div>
                                Michele
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="song_in_player row">
                            <div class="play_img col-md-1 col-sm-1 col-xs-1">
                                <img src="foto\icon\Start.png" class="img-circle">
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <div>
                                    Queen
                                </div>
                                <div>
                                    These Are The Days Of Our Lives
                                </div>
                            </div>
                            <div class="time_song col-md-2 col-sm-2 col-xs-2">
                                <p>
                                    4:08
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ url('scripts/songs/index.js') }}"></script>
@stop