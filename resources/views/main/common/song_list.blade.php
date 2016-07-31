<div>
    <div class="nbs-flexisel-inner">
        <div class="new_tag">
            <div class="tags">
                <h3>{{ $title }}</h3>
            </div>

            <ul class="song_list list-inline flexisel">
                @foreach($songs as $song)
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
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

