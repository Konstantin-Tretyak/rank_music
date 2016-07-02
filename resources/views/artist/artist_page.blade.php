        @extends('layout')

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
                                                    <span class="glyphicon glyphicon-flag" data-toggle="tooltip" data-placement="bottom"  title="Англия" aria-hidden="true"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Количество песен:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                        144
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Лучшая песня:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <a href="Song_Page.html">
                                                            I'm Going Slightly Mad
                                                        </a>
                                                        (197 место)
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h4>
                                                            Самая поппулярная:
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <a href="Song_Page.html">
                                                            We Are The Champions
                                                        </a>
                                                        (1543 прослушиваний)
                                                    </div>
                                                </div>
                                                <div class="row song_info_row rank_comments_lisents">
                                                    <div class="rank col-md-4">
                                                        <span class="glyphicon glyphicon-glass" data-toggle="tooltip" data-placement="bottom"  title="Рейтинг" aria-hidden="true"></span>
                                                        <p>
                                                            1
                                                        </p>
                                                    </div>
                                                    <div class="listents col-md-offset-4 col-md-4 col-sm-4">
                                                        <span class="glyphicon glyphicon-headphones" data-toggle="tooltip" data-placement="bottom"  title="Количество прослушиваний" aria-hidden="true"></span>
                                                        <p>
                                                            1530
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

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="0" data-wrap="false">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <ul class="song_list list-inline">
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <ul class="song_list list-inline">
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <ul class="song_list list-inline">
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="song">
                                                <div class="song_information">
                                                    <div class="artist_and_rank">
                                                        <img src="foto\Океан_Ельзи_-_Там_де_нас_нема.jpg" class="img-responsive"/>
                                                        <div class="action_song">
                                                            <span class="glyphicon glyphicon-play" title="Играть" aria-hidden="true">
                                                            </span>
                                                             <span class="glyphicon glyphicon-plus" title="Добавить себе" aria-hidden="true">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <a href="Song_Page.html">
                                                            Там, де нас нема
                                                        </a>
                                                        <a href="Artist_Page.html">
                                                            <p>
                                                                Океан Ельзи
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <img src="foto\icon\Left_arrow.png">
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <img src="foto\icon\Right_Arrow.png">
                                </a>
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
            </div>
        </div>

        @stop