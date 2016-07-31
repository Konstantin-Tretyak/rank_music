@extends('layout')

@section('content')

<div class="col-md-12">
    <div class="center_field col-md-offset-2 col-md-7 col-sm-12">
        <div class="new_tag">
            <div class="tags">
                <h3 class="col-md-8 col-sm-8 col-sm-12">
                    {{ $song->name }}
                </h3>
                <div id="tags_list" class="col-sm-4">
                    <ul class="song_tags list-inline">
                        <li>
                            <a href="#info" >
                                <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="bottom"  title="Информация" aria-hidden="true"></span>
                            </a>
                        </li>
                        @if($song->hasVideo())
                            <li>
                                <a href="#video" >
                                    <span class="glyphicon glyphicon-facetime-video" data-toggle="tooltip" data-placement="bottom"  title="Видео" aria-hidden="true"></span>
                                </a>
                            </li>
                        @endif
                        @if($song->hasText())
                            <li>
                                <a href="#text" >
                                    <span class="glyphicon glyphicon-list" href="#text" data-toggle="tooltip" data-placement="bottom"  title="Текст" aria-hidden="true"></span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#comment" >
                                <span class="glyphicon glyphicon-comment" href="#comment" data-toggle="tooltip" data-placement="bottom"  title="Комментарии" aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div data-spy="scroll" data-target="#tags_list" data-offset="0" class="song_content">
                <div id="info">
                    <div class="song_tag song_info">
                        <div  id="collapseInfo" class="info_content collapse in">
                            <div class="img_artist col-md-4">
                                <img src="{{ $song->photo }}">
                            </div>
                            <div class="about_song col-md-8">
                                <div class="row artist">
                                    <h3>
                                        <a href="{{route('artist.show', $song->performer->id)}}">
                                            {{ $song->performer->name }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="row song_info_row duration_country_year">
                                    <div class="duration col-md-4">
                                        <span class="glyphicon glyphicon-time" data-toggle="tooltip" data-placement="bottom"  title="Длительность" aria-hidden="true"></span>
                                        <p>
                                            {{ floor($song->duration/60) }}:@if($song->duration%60===0)00 @elseif($song->duration%60-10<0)0{{ $song->duration%60 }} @else{{ $song->duration%60 }}@endif
                                        </p>
                                    </div>
                                    <div class="country col-md-4">
                                        <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="bottom"  title="{{ $song->country->name }}" aria-hidden="true"></span>
                                    </div>
                                    @if($song->year!=0)
                                        <div class="year col-md-4">
                                            Год: {{ $song->year }}
                                        </div>
                                    @endif
                                </div>

                                <div class="row song_info_row">
                                    <div class="rating-container rating-xs rating-animate col-md-6">
                                        <input type="text" class="rating hide"
                                                value="
                                                @if(auth()->check())
                                                    {{ $song->userRank }}
                                                @else
                                                    {{ round($song->rank, 2) }}
                                                @endif
                                                " data-size="xs" data-song-id="{{ $song->id }}" data-action="{{ url('star_controller') }}" title="">
                                    </div>
                                    @if(auth()->check())
                                        <div class="year col-md-6">
                                            Рейтинг: {{ round($song->rank, 2) }}
                                        </div>
                                    @endif
                                </div>

                                <p>
                                    Тип: @if($song->is_song)песня @else инструментал @endif
                                </p>
                                <p>
                                    Жанр: {{ $song->genre->name }}
                                </p>
                                <p>
                                    Композитор: {{ $song->composer->name }}
                                </p>
                                <div class="row song_info_row rank_comments_lisents">
                                    <div class="rank col-md-4 col-sm-4 col-xs-4">
                                        <span class="glyphicon glyphicon-glass" data-toggle="tooltip" data-placement="bottom"  title="Рейтинг" aria-hidden="true"></span>
                                        <p>
                                            {{ $song->place_in_rank }}
                                        </p>
                                    </div>
                                    <div class="comments col-md-4 col-sm-4 col-xs-4">
                                        <span class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="bottom"  title="Комментарии" aria-hidden="true"></span>
                                        <p>
                                            {{ $song->comments->count() }}
                                        </p>
                                    </div>
                                    <div class="listents col-md-4 col-sm-4 col-xs-4">
                                        <span class="glyphicon glyphicon-headphones" data-toggle="tooltip" data-placement="bottom"  title="Количество прослушиваний" aria-hidden="true"></span>
                                        <p>
                                            {{ $song->listens_count }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($song->hasVideo())
                    <div id="video" class="song_tag songs_video">
                        <div class="song_info_row tag_name">
                                <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-facetime-video" data-toggle="tooltip" data-placement="bottom"  title="Видео" aria-hidden="true"></span>
                        </div>

                        <div class="player_wraper">
                            <iframe center id="collapseVideo" class="collapse in"  width="100%" height="350" src="https://www.youtube.com/embed/{{ $song->video_youtube_id }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                @endif

                @if($song->hasText())
                    <div id="text" class="song_tag song_text">
                        <div class="song_info_row tag_name">
                                <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-list" data-toggle="tooltip" data-placement="bottom" data-placement="bottom" title="Текст" aria-hidden="true"></span>
                            <div class="tag_tag col-md-1 col-md-push-10 xs-6">
                                <button type="button" class="btn btn-default shut_up only_shut_up" data-toggle="collapse" data-target="#collapseText" aria-expanded="true" aria-controls="collapseText">
                                    <span class="glyphicon glyphicon-chevron-down" data-toggle="tooltip" data-placement="bottom"  title="Спрятать" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <pre id="collapseText" class="collapse in" > A             D/A                A    D        G/D  D
                             Sometimes I get to feeling I was back in the old days long ago
                              A                   D/A      A    D       G/D  D
                             When we were kids, when we were young things seemed so perfect, you know
                             A/E
                             The days were nedless, we were crazy we were young
                             E
                             The sun was always shining, we just lived for fun
                             Bm/F#          Bm
                             Sometimes I feel like lately, I dont know
                             F#m                    E
                             The rest of my lifes been just a show

                             Chorus:
                             A     D/A  A   E/G#  F#m  E    D9
                             Those were the days of our lives
                             A        D/A   A   E/G#   A   E   D9
                             The bad things in life were so few
                             A   D/A  A   E/G#  F#m  G G  Dsus2  G   D/F#
                             Those days are all gone now, but one thing is true
                                      A/E         E          D
                             When I look, and I find I still love you

                             Verse 2:
                             You cant turn back the clock, you cant turn back the tide
                             Aint that a shame?
                             Id like to go back one time on a rollercoaster ride
                             When life`s just a game
                             No use in sitting and thinking on what you did
                             When you can lay back and enjoy it through your kids
                             Sometimes it seems like lately, I just dont know
                             Better sit back and go with the flow
                        </pre>
                    </div>
                @endif

                <div id="comment" class="song_tag song_comment">
                    <div class="song_info_row tag_name">
                        <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="bottom" data-placement="bottom"   title="Комментарии" aria-hidden="true"></span>
                    </div>

                    <div>
                        <div class="please_comment">
                            <p>
                                Вы можете оставить коментарий
                            </p>
                            <form class="comment" action="{{ action('CommentsController@store') }}" method="POST">
                                <input type="hidden" name="song_id" value="{{ $song->id }}">
                                <input type="hidden" name="user_id" value="1">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <textarea class="form-control" rows="5" placeholder="Введите комментарий" name="body"></textarea>
                                <button type="submit" class="btn btn-primary">
                                    Комментировать
                                </button>
                            </form>
                        </div>
                        <div class="other_comments">
                            <h3>
                                Коментарии пользователей
                            </h3>
                            <h6>
                                Оставленно {{ $song->comments->count() }} комментариев
                            </h6>

                            <div class="people_comments">
                                @foreach($song->comments as $comment)
                                    <div class="one_comment">
                                        <div class="about_user">
                                            <div class="user_img col-md-2 col-sm-2 col-xs-2">
                                                <img src="{{ $comment->user->photo }}">
                                            </div>
                                            <div class="user_name col-md-10 col-sm-10 col-xs-12">
                                                <h4>
                                                    {{ $comment->user->name }}
                                                </h4>
                                                <h6>
                                                    На сайте с {{ $comment->user->created_at }}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="user_coment">
                                            <div class="col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10 col-xs-12  comment">
                                                <p>
                                                    {{ $comment->body }}
                                                </p>
                                                <p class="coment_date">
                                                    Дата комментирования: {{ $comment->created_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@stop