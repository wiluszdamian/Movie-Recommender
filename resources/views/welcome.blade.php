@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($trendingGeneral as $result)
            <div class="hero__items set-bg set-bg-trending" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['poster']) }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $result['genre'] }}</div>
                            <h2>{{ $result['title'] ?? $result['name'] }}</h2>
                            <p>{{ $result['description'] }}</p>
                            <a href="{{ url('movie', ['id' => $result['id']]) }}"><span>Show more</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Trending Movies</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($trendingMovies as $result)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['poster']) }}">
                                        <div class="ep"><i class="fa fa-star"></i> {{ $result['vote_average'] }}</div>
                                        <div class="comment">{{ date('Y', strtotime($result['release_date'])) }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $result['vote_count'] }}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Movie</li>
                                            <li>{{ $result['genre'] }}</li>
                                        </ul>
                                        <h5><a href="{{ url('movie', ['id' => $result['id']]) }}">{{ $result['title'] ?? $result['name'] }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Trending TVs</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($trendingTvs as $result)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['poster']) }}">
                                        <div class="ep"><i class="fa fa-star"></i> {{ $result['vote_average'] }}</div>
                                        <div class="comment">{{ date('Y', strtotime($result['release_date'])) }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $result['vote_count'] }}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>TV</li>
                                            <li>{{ $result['genre'] }}</li>
                                        </ul>
                                        <h5><a href="#">{{ $result['title'] ?? $result['name'] }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Top Rated Movies</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($topRatedMovies as $result)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['poster_path']) }}">
                                        <div class="ep">{{ $result['vote_average'] }}</div>
                                        <div class="comment">{{ date('Y', strtotime($result['release_date'])) }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $result['vote_count'] }}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Movie</li>
                                            <li>{{ $result['genre'] }}</li>
                                        </ul>
                                        <h5><a href="{{ $result['id'] }}">{{ $result['title'] }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Top Rated TVs</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span><i class="fa fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($topRatedTvs as $result)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['poster_path']) }}">
                                    <div class="ep">{{ $result['vote_average'] }}</div>
                                    <div class="comment">{{ date('Y', strtotime($result['release_date'])) }}</div>
                                    <div class="view"><i class="fa fa-eye"></i> {{ $result['vote_count'] }}</div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li>TV</li>
                                        <li>{{ $result['genre'] }}</li>
                                    </ul>
                                    <h5><a href="{{ $result['id'] }}">{{ $result['title'] }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Upcoming Movies</h5>
                        </div>
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">This year</li>
                            <li data-filter=".{{ date('F', strtotime($todayDate)) }}">This month</li>
                        </ul>
                        <div class="filter__gallery">
                            @foreach ($upcomingMovies->slice(0, 7) as $result)
                            <div class="product__sidebar__view__item set-bg mix {{ date('F', strtotime($result['release_date'])) }}"
                                 data-setbg="{{ asset('https://image.tmdb.org/t/p/original/'.$result['backdrop_path']) }}">
                                <div class="ep"><i class="fa fa-star"></i> {{ $result['vote_average'] }}</div>
                                <div class="view"><i class="fa fa-eye"></i> {{ $result['vote_count'] }}</div>
                                <h5><a href="{{ url('movie', ['id' => $result['id']]) }}">{{ $result['title'] }} ({{ date('F', strtotime($result['release_date'])) }}, {{ date('Y', strtotime($result['release_date'])) }})</a></h5>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
