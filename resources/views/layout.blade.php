<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('css/main.css') }}">
        <link rel="stylesheet" href="{{ url('css/rank_list.css') }}">
        <link rel="stylesheet" href="{{ url('css/song_page.css') }}">
    </head>

    <title> RankMusic </title>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-2 col-sm-6">
                        <a href="main.html" class="navbar-brand">
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
                          <a class="nav-link" href="Ratings_List.html">РЕЙТИНГИ<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Songs_List+Filter.html">ПЕСНИ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle">
                                ВОЙТИ
                            </a>
                        </li>
                      </ul>

                    <div class="search_field col-md-7 col-sm-12 col-xs-12">
                        <form method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="search" placeholder="Поиск"
                                    @if(isset($filters['search']))
                                        value = "{{ $filters['search'] }}";
                                    @else
                                        placeholder="Поиск"
                                    @endif
                                >
                                <span class="input-group-btn">
                                    <button class="btn btn-default submit_search" type="button">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>


        <div class="footer">
            <h6>
                Сделал К. Третьяк 2016
            </h6>
        </div>

    <script src="scripts\jquery-1.12.1.js"> </script>
    <script src="scripts\bootstrap.js"> </script>

    </body>

</html>