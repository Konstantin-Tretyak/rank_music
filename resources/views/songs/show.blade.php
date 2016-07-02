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
                        <li>
                            <a href="#audio" >
                                <span class="glyphicon glyphicon-music" data-toggle="tooltip" data-placement="bottom"  title="Аудио" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#video" >
                                <span class="glyphicon glyphicon-facetime-video" data-toggle="tooltip" data-placement="bottom"  title="Видео" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#text" >
                                <span class="glyphicon glyphicon-list" href="#text" data-toggle="tooltip" data-placement="bottom"  title="Текст" aria-hidden="true"></span>
                            </a>
                        </li>
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
                                        {{ $song->performer->name }}
                                    </h3>
                                </div>
                                <div class="row song_info_row duration_country_year">
                                    <div class="duration col-md-4">
                                        <span class="glyphicon glyphicon-time" data-toggle="tooltip" data-placement="bottom"  title="Длительность" aria-hidden="true"></span>
                                        <p>
                                            {{ floor($song->duration/60) }}:{{ $song->duration%60 }}
                                        </p>
                                    </div>
                                    <div class="country col-md-4">
                                        <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="bottom"  title="{{ $song->country->name }}" aria-hidden="true"></span>
                                    </div>
                                    <div class="year col-md-4">
                                        Год: {{ $song->year }}
                                    </div>
                                </div>
                                <div class="row song_info_row stars_and_value">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <p>
                                        {{ round($song->rank(),1) }}/5 ({{ $song->rank_count() }} голоса)
                                    </p>
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
                                            {{ $song->place_in_the_rank() }}
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
                                            {{ $song->listen_count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="audio" class="song_tag song_audio">
                    <div class="song_info_row tag_name">
                        <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-music" data-toggle="tooltip" data-placement="bottom"  title="Аудио" aria-hidden="true"></span>
                        <div class="tag_tag col-md-1 col-md-push-10 xs-6">
                        </div>
                        <div class="tag_tag col-md-offset-4 col-md-6 col-md-pull-1 xs-12" >
                            <ul class="list-inline">
                                <li>
                                    <button type="button" class="btn btn-info">оригинал</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-info">live</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-info">кавер</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul  class="list-unstyled">
                        <li>
                            <div class="song_in_player">
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
                            <div class="song_in_player">
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

                <div id="video" class="song_tag song_video">
                    <div class="song_info_row tag_name">
                            <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-facetime-video" data-toggle="tooltip" data-placement="bottom"  title="Видео" aria-hidden="true"></span>
                        <div class="tag_tag col-md-1 col-md-push-10 xs-6">

                        </div>
                        <div  class="tag_tag col-md-offset-4 col-md-6 col-md-pull-1 xs-12" >
                            <ul class="list-inline">
                                <li>
                                    <button type="button" class="btn btn-info">оригинал</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-info">live</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-info">кавер</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <video id="collapseVideo" class="collapse in"  controls="" src="video\Queen(Poslednij klip Freddi Merkuri) - These Are The Days Of Our Lives.240.mp4"> </video>
                </div>


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

                <div id="comment" class="song_tag song_comment">
                    <div class="song_info_row tag_name">
                        <span class="tag_tag col-md-1 col-sm-6 col-xs-6 glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="bottom" data-placement="bottom"   title="Комментарии" aria-hidden="true"></span>
                    </div>

                    <div>
                        <div class="please_comment">
                            <p>
                                Вы можете оставить коментарий
                            </p>
                            <form>
                                <textarea class="form-control" rows="5" placeholder="Введите комментарий" name="comments"></textarea>
                                <button type="submit" class="btn btn-primary">
                                    Комметировать
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