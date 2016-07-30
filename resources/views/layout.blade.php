<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="_token" content="<?php echo csrf_token(); ?>">
        <link rel="SHORTCUT ICON" href="http://ru.seaicons.com/wp-content/uploads/2015/11/Music-Music-Record-icon.png" type="image/x-icon">
        <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('css/main.css') }}">
        <link rel="stylesheet" href="{{ url('css/rank_list.css') }}">
        <link rel="stylesheet" href="{{ url('css/song_page.css') }}">
        <link rel="stylesheet" href="{{ url('css/star-rating.css') }}">
        <link rel="stylesheet" href="{{ url('css/rating_list.css') }}">
        <link rel="stylesheet" href="{{ url('css/carousel.css') }}">
        <link rel="stylesheet" href="{{ url('css/pnotify.custom.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/select2.css') }}">

    </head>

    <title> RankMusic </title>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-2 col-sm-6">
                        <a href="/" class="navbar-brand">
                            RankMusic
                        </a>

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">
                                Меню
                            </span>
                            <span class="glyphicon glyphicon-menu-hamburger">
                        </button>
                    </div>

                      <ul class="col-md-3 col-sm-6 nav navbar-right navbar-nav collapse navbar-collapse">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('ranks') }}">РЕЙТИНГИ<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('songs') }}">ПЕСНИ</a>
                        </li>
                        <li class="nav-item dropdown">
                            @if(auth()->check())
                                <li class="nav-item user dropdown">
                                    <a id="dLabel" data-target="#" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ url(auth()->user()->photo) }}">
                                        <span class="caret"></span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu" aria-labelledby="dLabel">
                                        <li><a href="{{ route('user.show',auth()->user()->id) }}">Моя страница</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                                    </ul>
                                </li>

                            @else
                                <a href="{{ route('login') }}" class="dropdown-toggle">
                                    ВОЙТИ
                                </a>
                            @endif
                        </li>
                      </ul>

                    <div class="search_field col-md-7 col-sm-12 col-xs-12">
                        <form method="GET" class="search_form" action="{{ route('songs.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="search" placeholder="Поиск"
                                    @if(isset($filters['search']))
                                        value = "{{ $filters['search'] }}";
                                    @else
                                        placeholder="Поиск"
                                    @endif
                                >

                                <span class="input-group-btn">
                                    <button class="btn btn-default submit_search" type="submit">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </span>
                            </div>
                            <div class="filter_for_search" style="display:none">
                                <label class="checkbox-inline"><input type="checkbox" name="select_all" value="">по всему</label>
                                <label class="checkbox-inline"><input type="checkbox" name="search_filter[]" value="">по названию</label>
                                <label class="checkbox-inline"><input type="checkbox" name="search_filter[]" value="">по исполнителю</label>
                                <label class="checkbox-inline"><input type="checkbox" name="search_filter[]" value="">по композитору</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="information">
            <div class="container">
                @yield('content')
            </div>

            <!--@yield('player')-->

        </div>

            <div class="footer">
                <h6>
                    Сделал К. Третьяк 2016
                </h6>
            </div>

    <script src="{{ url('scripts/jquery.js') }}"> </script>
    <script src="{{ url('scripts/bootstrap.js') }}"> </script>
    <script src="{{ url('scripts/select2.min.js') }}"> </script>
    <script>
        $(".js-example-tags").select2({
          tags: true,
          placeholder: 'Выбрать',
        });
    </script>
    <script type="text/javascript">
        $('.select2-container').css('width','100%');
    </script>

    <script src="{{ url('scripts/pnotify.custom.min.js') }}"> </script>
    <script src="{{ url('scripts/app.js') }}"> </script>
    <script src="{{ url('scripts/comments.js') }}"> </script>
    <script src="{{ url('scripts/star-rating.js') }}"> </script>
    <script src="{{ url('scripts/jquery.flexisel.js') }}"> </script>


   <script type="text/javascript">
            $(document).ready(function() {
                @foreach($songs_count as $key=>$value)
                    @if($value==2)
                        $("#flexiselDemo{{ $key }}").flexisel();
                    @elseif($value>=3)
                        $("#flexiselDemo{{ $key }}").flexisel();
                    @endif
                @endforeach
            });
    </script>

    <script >
        $('input.search').on('focus', function(){
            $('.filter_for_search').css("display","block");
        });
    </script>

    <script>
        $('.information').on('click', function(){
            if($('.filter_for_search').css("display")==="block")
                $('.filter_for_search').css("display","none")
        });
    </script>


    <script>
    $('.glyphicon-play').on('click',function(){
        var video_id = $(this).data('youtubeId');
        $('body').prepend(`<div class='song_video col-md-12' style='display: none;'>
            <div class='player col-md-offset-3 col-md-7 col-sm-12'>
            <iframe width='100%' height='400px' src='http://www.youtube.com/embed/`+video_id+`?rel=0&autoplay=1' frameborder='0' allowfullscreen>
            </iframe>
            </div>
            </div>`);
        $('.song_video').css('display','block');

        ///Добавление в счетчик прослушиваний
        $.ajax
            ({
                url: "{{ action('ListenController@store') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                method: 'POST',
                data: {'song_id':$(this).data('songId')},
            });
    });

    </script>
    <script>
    $('body').on('click','.song_video',function(){
        $('.song_video').remove();
        $('iframe').attr('src','');
    });
    </script>

    <script type="text/javascript">
        $('iframe').on('onmousedown',function(){
            alert(2);
        });
    </script>

    @yield('js')

    </body>

</html>