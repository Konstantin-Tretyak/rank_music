@extends('layout')

@section('content')
<div class="content_field">
    <div class="container">
        <div class="col-md-12">
            <div class="center_field col-md-offset-2 col-md-7 col-sm-12">
                @include('main/common/song_list', ['songs' => $new_songs, 'title' => 'Новые песни'])

                @include('main/common/song_list', ['songs' => $best_songs, 'title' => 'Лучшие песни'])
                <div class="for_all">
                    <ul class="list-inline">
                        <li>
                            <a type="button" class="btn btn-primary" href="{{ url('songs') }}">
                                Смотреть все
                            </a>
                        </li>
                    </ul>
                </div>

                @include('main/common/song_list', ['songs' => $popular_songs, 'title' => 'Популярные песни'])
            </div>
        </div>
    </div>
</div>

@stop