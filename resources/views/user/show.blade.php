@extends('layout')

@section('content')

<div class="content_field">
    <div class="container">
        <div class="col-md-12">
            <div class="center_field col-md-offset-2 col-md-7 col-sm-12">
                <div class="new_tag">
                    <div class="tags">
                        <h3 class="col-md-8 col-sm-8 col-sm-12">
                            {{ $user->name }}
                        </h3>
                    </div>

                    <div data-spy="scroll" data-target="#tags_list" data-offset="0" class="song_content">
                        <div id="info">
                            <div class="song_tag song_info">
                                <div  id="collapseInfo" class="info_content collapse in">
                                    <div class="img_artist col-md-4 col-sm-4 col-xs-8">
                                        <img src="{{ $user->photo }}">
                                    </div>
                                    <div class="about_song col-md-8 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php $mostListensSong = $user->mostListensSong(); ?>
                                                <h4>
                                                    Часто слушает песню:
                                                </h4>
                                            </div>
                                            @if($mostListensSong->count>1)
                                                <div class="col-md-7">
                                                    <a href="{{ route('songs.show', $mostListensSong->id) }}">
                                                        {{ $mostListensSong->name }}
                                                    </a>
                                                    ({{ $mostListensSong->count }} прослушивания)
                                                </div>
                                            @else
                                                <div class="col-md-7">
                                                    Нет определенной песни
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h4>
                                                    Часто слушает исполнителя:
                                                </h4>
                                            </div>
                                            <?php $mostListenPerformer=$user->mostListensPerformer(); ?>
                                            <div class="col-md-7">
                                                <a href="{{ route('artist.show', $mostListenPerformer->id) }}">
                                                    {{$mostListenPerformer->name}}
                                                </a>
                                                {{$mostListenPerformer->listen_count}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($songs_list)
                            <div id="audio" class="song_tag song_audio">
                                <div class="song_info_row tag_name">
                                    <span class="glyphicon glyphicon-music" data-toggle="tooltip" data-placement="bottom"  title="Аудио" aria-hidden="true"></span>
                                </div>

                                <?php $id=0; $songs_count=[]; ?>
                                @foreach($songs_list as $rank=>$list)
                                    @if($rank==3.5)
                                        {{ dd("HEELO") }}
                                    @endif
                                    @if(isset($rank))
                                        <?php $id++; ?>
                                        <div>
                                            <div class="nbs-flexisel-inner">
                                                <div class="new_tag">
                                                    @if($rank==0)
                                                        <div class="tags">
                                                            <h3>Все песни, за которые голосовал</h3>
                                                        </div>
                                                    @else
                                                        <div class="tags">
                                                            <h3>Проголосовал на {{ $rank/10 }}</h3>
                                                        </div>
                                                    @endif

                                                    <ul id="flexiselDemo{{ $id }}" class="song_list list-inline">
                                                        @foreach($list as $song)
                                                            <li class="song">
                                                                <div class="song_information">
                                                                    <div class="artist_and_rank">
                                                                        <img src="{{ $song->performer->photo }}" class="img-responsive"/>
                                                                        <div class="action_song">
                                                                        @if($song->hasVideo())
                                                                            <span class="glyphicon glyphicon-play" data-song-id="{{ $song->id }}" data-youtube-id="{{ $song->video_youtube_id }}" title="Играть" aria-hidden="true">
                                                                            </span>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="details name">
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
                                                    <button type="button" class="btn btn-primary">
                                                        Смотреть все
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    <?php $songs_count[$id]=count($list); ?>
                                @endforeach
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
