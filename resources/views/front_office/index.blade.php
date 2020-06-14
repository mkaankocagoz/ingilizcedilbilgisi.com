@extends('front_office.layouts.master')

@section('content')

    <style>
        .thumb-info-side-image-custom {
            border: 0 none;
            color: #777;
            margin: 0 0 31px;
        }
        .thumb-info-side-image-custom .thumb-info-side-image-wrapper {
            padding: 0;
            margin-right: 30px;
        }
        .thumb-info-side-image-custom .thumb-info-caption {
            text-align: left;
        }
        .thumb-info-side-image-custom .thumb-info-caption h4 {
            margin: 27.2px 0 0;
            margin: 1.7rem 0 0;
            padding: 0;
        }
        .thumb-info-side-image-custom .thumb-info-caption p {
            margin: 0;
            padding: 0;
            font-size: 15px;
            line-height: 24px;
        }
        .thumb-info-side-image-custom.thumb-info-side-image-custom-highlight .thumb-info-side-image-wrapper {
            margin: 0;
            padding: 0;
        }
        .thumb-info-side-image-custom.thumb-info-side-image-custom-highlight .thumb-info-caption {
            padding: 25.6px;
            padding: 1.6rem;
            display: block;
            clear: both;
        }
        .thumb-info-side-image-custom.thumb-info-side-image-custom-highlight .thumb-info-caption h4 {
            margin: 3px 0;
            padding: 0;
        }
        .thumb-info-side-image-custom.thumb-info-side-image-custom-highlight .thumb-info-caption p {
            margin: 0;
            padding: 0;
        }
        .thumb-info-side-image-custom.thumb-info-side-image-custom-highlight .thumb-info-caption .thumb-info-caption-text {
            padding: 0;
        }

        @media (max-width: 1199px) {
            .thumb-info-side-image-custom .thumb-info-caption h4 {
                margin: 1rem 0 0;
            }
        }
        @media (max-width: 991px) {
            .thumb-info-side-image-custom .thumb-info-side-image-wrapper {
                float: none;
                margin: 0 0 10px 0;
                padding: 0;
            }
            .thumb-info-side-image-custom .thumb-info-side-image-wrapper img {
                max-width: 100% !important;
                width: 100%;
                margin-bottom: 20px;
            }
            .thumb-info-side-image-custom .thumb-info-caption {
                padding: 0 10px;
                display: block;
                clear: both;
            }
            .thumb-info-side-image-custom .thumb-info-caption .thumb-info-caption-text {
                padding: 10px !important;
            }
            .thumb-info-side-image-custom .thumb-info-caption h4 {
                margin: 3px 0;
                padding: 0;
            }
            .thumb-info-side-image-custom .thumb-info-caption p {
                margin: 0;
                padding: 0;
            }
        }

        .thumb-info-caption-text p {
            word-break: break-word;
        }
    </style>

    <div class="container py-4">
        <div class="row">

            <section class="section section-no-background section-no-border m-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3 class="mb-0 pb-0 text-uppercase">Gramer Dersleri <small>(Son Konular)</small></h3>
                            <div class="divider divider-primary divider-small divider-small-center mb-4 mt-0">
                                <hr class="mt-2">
                            </div>
                            <div class="row pt-4">
                                <div class="col-lg-6">
                                    @php $gramer_count = 1 @endphp
                                    @foreach($gramer_dersleri as $item)
                                        @php
                                            $site_url = \App\Models\Page::where('id', $item->page_id)->first();
                                        @endphp
                                        @if($gramer_count == 1)
                                            <a href="{{ url('/gramer/'.$site_url->page_name_slug.'/'.$item->site_url) }}" class="text-decoration-none">
                                                <span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom box-shadow-custom thumb-info-no-zoom thumb-info-side-image-custom-highlight appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="0" style="animation-delay: 0ms;">
                                                    <span class="thumb-info-side-image-wrapper">
                                                        <img alt="{{$item->title}}" class="img-fluid" src="{{ asset('front_assets/img/subject_img/'.$item->image) }}">
                                                    </span>
                                                    <span class="thumb-info-caption">
                                                        <span class="thumb-info-caption-text">
                                                            <h4 class="text-uppercase">{{ $item->title }}</h4>
                                                            <p>{!! \Str::limit(strip_tags($item->content, 400)) !!}</p>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                                </div>
                                                <div class="col-lg-6">
                                            @php $gramer_count = 2 @endphp
                                        @else
                                            <a href="{{ url('/gramer/'.$site_url->page_name_slug.'/'.$item->site_url) }}" class="text-decoration-none">
                                                <span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom box-shadow-custom appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="animation-delay: 300ms;">
                                                    <span class="thumb-info-side-image-wrapper">
                                                        <img alt="{{$item->title}}" class="img-fluid" style="max-width: 225px;" src="{{ asset('front_assets/img/subject_img/'.$item->image) }}">
                                                    </span>
                                                    <span class="thumb-info-caption">
                                                        <span class="thumb-info-caption-text pr-3">
                                                            <h4 class="text-uppercase" style="margin-top: 0px;">{{ $item->title }}</h4>
                                                            <p>{!! \Str::limit(strip_tags($item->content, 400)) !!}</p>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-primary btn-lg text-2 text-uppercase mt-2" href="{{ url('/gramer/baslangic-seviye-gramer') }}">Hepsini Gör</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-no-background section-no-border m-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3 class="mb-0 pb-0 text-uppercase">Kelime Dersleri <small>(Son Konular)</small></h3>
                            <div class="divider divider-primary divider-small divider-small-center mb-4 mt-0">
                                <hr class="mt-2">
                            </div>
                            <div class="row pt-4">
                                <div class="col-lg-6">
                                    @php $kelime_count = 1 @endphp
                                    @foreach($kelime_dersleri as $item)
                                        @php
                                            $site_url = \App\Models\Page::where('id', $item->page_id)->first();
                                        @endphp
                                        @if($kelime_count == 1)
                                            <a href="{{ url('/kelime/'.$site_url->page_name_slug.'/'.$item->site_url) }}" class="text-decoration-none">
                                                <span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom box-shadow-custom thumb-info-no-zoom thumb-info-side-image-custom-highlight appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="0" style="animation-delay: 0ms;">
                                                    <span class="thumb-info-side-image-wrapper">
                                                        <img alt="{{$item->title}}" class="img-fluid" src="{{ asset('front_assets/img/subject_img/'.$item->image) }}">
                                                    </span>
                                                    <span class="thumb-info-caption">
                                                        <span class="thumb-info-caption-text">
                                                            <h4 class="text-uppercase">{{ $item->title }}</h4>
                                                            <p>{!! \Str::limit(strip_tags($item->content, 400)) !!}</p>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                </div>
                                <div class="col-lg-6">
                                    @php $kelime_count = 2 @endphp
                                    @else
                                        <a href="{{ url('/kelime/'.$site_url->page_name_slug.'/'.$item->site_url) }}" class="text-decoration-none">
                                            <span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom box-shadow-custom appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="animation-delay: 300ms;">
                                                <span class="thumb-info-side-image-wrapper">
                                                    <img alt="{{$item->title}}" class="img-fluid" style="max-width: 225px;" src="{{ asset('front_assets/img/subject_img/'.$item->image) }}">
                                                </span>
                                                <span class="thumb-info-caption">
                                                    <span class="thumb-info-caption-text pr-3">
                                                        <h4 class="text-uppercase" style="margin-top: 0px;">{{ $item->title }}</h4>
                                                        <p>{!! \Str::limit(strip_tags($item->content, 400)) !!}</p>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-primary btn-lg text-2 text-uppercase mt-2" href="{{ url('/kelime/yakin-anlamli-kelimeler') }}">Hepsini Gör</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    @endsection
