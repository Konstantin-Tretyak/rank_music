        @extends('layout')

<!--<?php
$homepage = file_get_contents('http://mp3xl.org/search/?query=maroon%205%20Better%20That%20We%20Break');
echo "<iframe src='http://mp3xl.org/search/?query=maroon%205%20Nothing%20Lasts%20Forever'></iframe>";
?>-->

        @section('content')
        <div class="content_field">
            <div class="container">
                <div class="col-md-12">
                    <div class="center_field col-md-offset-2 col-md-7 col-sm-12">
                        <div class="new_tag">
                            <div class="tags">
                                <h3 class="col-md-8 col-sm-8 col-sm-12">
                                    {{$artist->name}}
                                </h3>
                            </div>

                            <div data-spy="scroll" data-target="#tags_list" data-offset="0" class="song_content">
                                <div id="info">
                                    <div class="song_tag song_info">
                                        <div class="info_content">
                                            <div class="img_artist col-md-4 col-sm-4 col-xs-8">
                                                <img src="{{$artist->photo}}">
                                            </div>
                                            <div class="about_song col-md-8 col-sm-8 col-xs-12">
                                                <div class="song_info_row country">
                                                    <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="bottom"  title="{{$artist->country->name}}" aria-hidden="true"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Количество песен:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                        {{ $artist->countSong() }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Лучшая песня:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                    <a href="{{ route('songs.show', $artist->bestSong()->id) }}">
                                                            {{ $artist->bestSong()->name }}
                                                        </a>
                                                        ({{ $artist->bestSong()->place_in_rank }} место)
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Самая поппулярная:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                    <a href="{{ route('songs.show', $artist->popularSong()->id) }}">
                                                            {{ $artist->popularSong()->name }}
                                                        </a>
                                                        ({{ $artist->maxLisensSong() }} прослушиваний)
                                                    </div>
                                                </div>
                                                <div class="row song_info_row rank_comments_lisents">
                                                    <div class="listents col-md-4 col-sm-4">
                                                        <span class="glyphicon glyphicon-headphones" data-toggle="tooltip" data-placement="bottom"  title="Количество прослушиваний" aria-hidden="true"></span>
                                                        <p>
                                                            {{ $artist->allListensSongs() }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="audio" class="song_tag song_audio">
                                    <div class="song_info_row tag_name">
                                        <span class="glyphicon glyphicon-music" data-toggle="tooltip" data-placement="bottom"  title="Аудио" aria-hidden="true"></span>
                                    </div>
                                        <div>
                                            <div class="nbs-flexisel-inner">
                                                <div class="new_tag">
                                                    <ul class="song_list list-inline flexisel">
                                                        @foreach($artist->performerSongs()->limit(12)->get() as $song)
                                                            <li class="song">
                                                                <div class="song_information">
                                                                    <div class="artist_and_rank">
                                                                        <img src="{{ $artist->photo }}" class="img-responsive"/>
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
                                                                        <a href="{{ route('artist.show', $artist->id) }}">
                                                                            <p>
                                                                                {{ $artist->name }}
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="for_all">
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="{{ url("songs?performer=$artist->id") }}" type="button" class="btn btn-primary">
                                                        Смотреть все
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>


        </div>

        @stop