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
                                    <div class="panel-heading" role="tab" id="headingPerformer">
                                        <a class="galka-button panel-button btn btn-default"  data-toggle="collapse" data-parent="#accordion" data-target="#collapsePerformer" aria-expanded="true" aria-controls="collapsePerformer">
                                            Исполнитель
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapsePerformer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPerformer">
                                        <div class="panel-body padding-10">
                                            <select class="js-example-tags form-control genre" multiple="" name="performer[]">
                                                @foreach($performers as $performer)
                                                    <option value="{{ $performer->id }}"
                                                            @if(!empty($filters['performer']))
                                                                @foreach ($filters['performer'] as $filter)
                                                                    @if($filter == $performer->id)
                                                                        selected="selected"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    >
                                                        {{ $performer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingComposer">
                                        <a class="galka-button panel-button btn btn-default"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseComposer" aria-expanded="true" aria-controls="collapseComposer">
                                            Композитор
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseComposer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingComposer">
                                        <div class="panel-body padding-10">
                                            <select class="js-example-tags form-control select2-hidden-accessible genre" multiple="" name="composer[]" tabindex="-1" aria-hidden="true">
                                                @foreach($composers as $composer)
                                                    <option value="{{ $composer->id }}"
                                                            @if(!empty($filters['composer']))
                                                                @foreach ($filters['composer'] as $filter)
                                                                    @if($filter == $composer->id)
                                                                        selected="selected"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    >
                                                        {{ $composer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <a class="galka-button panel-button btn btn-default"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Жанр
                                            <span class="glyphicon glyphicon-galka" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body padding-10">
                                            <select class="js-example-tags form-control select2-hidden-accessible genre" multiple="" name="genre[]" tabindex="-1" aria-hidden="true">
                                                @foreach($genres as $genre)
                                                    <option value="{{ $genre->id }}"
                                                            @if(!empty($filters['genre']))
                                                                @foreach ($filters['genre'] as $filter)
                                                                    @if($filter == $genre->id)
                                                                        selected="selected"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    >
                                                        {{ $genre->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                          <div class="panel-body padding-10">
                                            <select class="js-example-tags form-control select2-hidden-accessible country" multiple="" name="country[]" tabindex="-1" aria-hidden="true">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                            @if(!empty($filters['country']))
                                                                @foreach ($filters['country'] as $filter)
                                                                    @if($filter == $country->id)
                                                                        selected="selected"
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    >
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>

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
                                            <select class="select_range" onchange="$('.select_decade, .select_century').val('')" name="year[years][min]">
                                                <option value
                                                    @if( !isset($filters['year']) )
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
                                            <select class="select_range" onchange="$('.select_decade, .select_century').val('')" name="year[years][max]">
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
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary submit_filter">Искать</button>
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
                    <form class="sort_filter">
                        <label>
                            Сортировка
                        </label>
                        <select class="form-control" name="sort">
                            <option value="place_in_rank" @if(isset($filters['sort']) || $filters['sort']=="place_in_rank")selected @endif> По рейтингу </option>
                            <option value="name" @if(isset($filters['sort']) && $filters['sort']=="name")selected @endif> По названию </option>
                            <option value="performer" @if(isset($filters['sort']) && $filters['sort']=="performer")selected @endif> По исполнителю </option>
                            <option value="composer" @if(isset($filters['sort']) && $filters['sort']=="composer")selected @endif> По композитору </option>
                            <option value="duration" @if(isset($filters['sort']) && $filters['sort']=="duration")selected @endif> По длительности </option>
                            <option value="year "@if(isset($filters['sort']) && $filters['sort']=="year")selected @endif> По году </option>
                        </select>
                        <button type="submit" class="btn btn-primary submit_sort">Сортировать</button>
                    </form>
                </div>

                <ul class="song_list list-inline">
                    @foreach($songs as $song)
                        <li class="song">
                            <div class="song_information">
                                <div class="artist_and_rank">
                                    <img src="{{ $song->photo }}" class="img-responsive"/>
                                    <div class="action_song">
                                        @if($song->hasVideo())
                                            <span class="glyphicon glyphicon-play" data-song-id="{{ $song->id }}" data-youtube-id="{{ $song->video_youtube_id }}" title="Играть" aria-hidden="true">
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="details  name">
                                    <div class="rating-container rating-xs rating-animate">
                                        <input type="text" class="rating hide"
                                                value="
                                                @if(auth()->check())
                                                    {{ $song->userRank }}
                                                @else
                                                    {{ round($song->rank, 2) }}
                                                @endif
                                                " data-size="xs" data-song-id="{{ $song->id }}" data-action="{{ url('star_controller') }}" title="">
                                    </div>
                                    <a href="{{ route('songs.show', $song->id) }}">
                                        {{ $song->name }}
                                    </a>
                                    <a href="{{ route('artist.show', $song->performer->id) }}">
                                        <p>
                                            {{ $song->performer->name }}
                                        </p>
                                    </a>
                                        <p>
                                            {{ floor($song->duration/60) }}:@if($song->duration%60===0)00 @elseif($song->duration%60-10<0)0{{ $song->duration%60 }} @else{{ $song->duration%60 }}@endif
                                        </p>
                                        <p>
                                            Год: {{ $song->year }}
                                        </p>
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

    </div>

@stop

@section('js')
    <script src="{{ url('scripts/songs/index.js') }}"></script>
    <script type="text/javascript">
        $(function () {
                $('.select_all').change(function () {
                    var sybli = $(this).siblings();
                    var chil = sybli.find('input');
                    var label = $(this).find('label');
                    var input = $(this).find('input')[0];
                    chil.prop('checked', input.checked);

                    if(input.checked)
                        label.html("<input type='checkbox' name='total' checked='checked'>"+"Отменить выделение");
                    else
                        label.html("<input type='checkbox' name='total'>"+"Выделить всё");
                });
            });
    </script>
@stop