@extends('layouts.app')

@section('title', 'Details')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href=""><i class="fa fa-home"></i> Home</a>
                    <a href="">Categories</a>
                        @foreach ($details['genres'] as $genre)
                            <span>
                                {{ $genre['name'] }}
                                @if (!$loop->last)/@endif
                            </span>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg set-bg-trending" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$details['poster_path']) }}">
                        <div class="comment"><i class="fa fa-imdb"></i></div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $details['title'] }} ({{ date('Y', strtotime($details['release_date'])) }})</h3>
                            <span>{{ $details['tagline'] }}</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#" data-rating="1"><i class="fa fa-star-o"></i></a>
                                <a href="#" data-rating="2"><i class="fa fa-star-o"></i></a>
                                <a href="#" data-rating="3"><i class="fa fa-star-o"></i></a>
                                <a href="#" data-rating="4"><i class="fa fa-star-o"></i></a>
                                <a href="#" data-rating="5"><i class="fa fa-star-o"></i></a>
                            </div>
                            <span id="votes">{{ $details['vote_count'] }} Votes</span>
                        </div>
                        <p>{{ $details['overview'] }}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span> Movie</li>
                                        <li><span>Studios:</span>
                                            @foreach ($details['production_companies'] as $studio)
                                                {{ $studio['name'] }}
                                                @if (!$loop->last),@endif
                                            @endforeach
                                        </li>
                                        <li><span>Release Date:</span> {{ date('d F Y', strtotime($details['release_date'])) }}</li>
                                        <li><span>Status:</span> {{ $details['status'] }}</li>
                                        <li><span>Genre:</span>
                                            @foreach ($details['genres'] as $genre)
                                                {{ $genre['name'] }}
                                                @if (!$loop->last),@endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Scores:</span> {{ $details['vote_average'] }} / {{ $details['vote_count'] }}</li>
                                        <li><span>Language:</span>
                                            @foreach ($details['spoken_languages'] as $spokenLanguage)
                                                {{ $spokenLanguage['name'] }}
                                                @if (!$loop->last),@endif
                                            @endforeach
                                        </li>
                                        <li><span>Duration:</span> {{ $details['runtime'] }} min.</li>
                                        <li><span>Budget:</span> {{ '$' . number_format($details['budget'], 2) }}</li>
                                        <li><span>Revenue:</span> {{ '$' . number_format($details['revenue'], 2) }}</li>
                                        <li><span>Country:</span>
                                            @foreach ($details['production_countries'] as $productionCountry)
                                                {{ $productionCountry['name'] }}
                                                @if (!$loop->last),@endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="{{ $details['homepage'] }}" class="show-btn"><i class="fa fa-eye"></i> Show</a>
                            <a href="{{ url('https://www.imdb.com/title/') . $details['imdb_id'] }}" class="imdb-btn"><i class="fa fa-imdb"></i> IMDB</a>
                            <a href="{{ route('demo') }}" class="follow-btn"><i class="fa fa-plus"></i> Add to watchlist</a>
                            <a href="{{ route('demo') }}" class="bookmark-btn"><i class="fa fa-bookmark-o"></i><a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="live__product anime__details__review">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Cast</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Shouwa Genroku Rakugo Shinjuu</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Mushishi Zoku Shou 2nd Season</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Mushishi Zoku Shou: Suzu no Shizuku</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Fate/stay night Movie: Heaven's Feel - II. Lost</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Kizumonogatari II: Nekketsu-hen</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="live__product anime__details__review">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Similar Movies</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="btn__all">
                            <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Shouwa Genroku Rakugo Shinjuu</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Mushishi Zoku Shou 2nd Season</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Mushishi Zoku Shou: Suzu no Shizuku</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Fate/stay night Movie: Heaven's Feel - II. Lost</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('img/example.jpg') }}">
                                <div class="ep">18 / 18</div>
                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            </div>
                            <div class="product__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Kizumonogatari II: Nekketsu-hen</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                            <p>Finally it came out ages ago</p>
                        </div>
                    </div>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{ asset('img/review.jpg') }}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                            <p>Where is the episode 15 ? Slow update! Tch</p>
                        </div>
                    </div>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Your Comment"></textarea>
                        <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                    </form>
                </div>
            </div>
{{--            <div class="col-lg-4 col-md-4">--}}
{{--                <div class="anime__details__sidebar">--}}
{{--                    <div class="section-title">--}}
{{--                        <h5>you might like...</h5>--}}
{{--                    </div>--}}
{{--                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">--}}
{{--                        <div class="ep">18 / ?</div>--}}
{{--                        <div class="view"><i class="fa fa-eye"></i> 9141</div>--}}
{{--                        <h5><a href="#">Boruto: Naruto next generations</a></h5>--}}
{{--                    </div>--}}
{{--                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">--}}
{{--                        <div class="ep">18 / ?</div>--}}
{{--                        <div class="view"><i class="fa fa-eye"></i> 9141</div>--}}
{{--                        <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>--}}
{{--                    </div>--}}
{{--                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">--}}
{{--                        <div class="ep">18 / ?</div>--}}
{{--                        <div class="view"><i class="fa fa-eye"></i> 9141</div>--}}
{{--                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>--}}
{{--                    </div>--}}
{{--                    <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">--}}
{{--                        <div class="ep">18 / ?</div>--}}
{{--                        <div class="view"><i class="fa fa-eye"></i> 9141</div>--}}
{{--                        <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
</section>
<!-- Anime Section End -->
@endsection
