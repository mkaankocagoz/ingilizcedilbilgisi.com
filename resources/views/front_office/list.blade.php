@extends('front_office.layouts.master')

@section('content')

    @include('front_office.layouts.breadcrumb', ['categoryName' => $categoryName, 'page' => $page])

    <div class="container py-4">
        <div class="row">

            @include('front_office.layouts.right_menu')

            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts">
                    @if(!$article_list->isEmpty())
                        @foreach($article_list as $item)
                            <article class="post post-medium">
                                <div class="row mb-3">
                                    <div class="col-lg-5">
                                        <div class="post-image">
                                            <img style="height: 200px;" src="{{ asset('front_assets/img/subject_img/'.$item->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="post-content">
                                            <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
                                                @if($site_url == 'blog' || $site_url == 'hikaye')
                                                    <a href="{{ url('/'.$site_url.'/'.$item->site_url) }}">{{ $item->title }}</a>
                                                @else
                                                    <a href="{{ url('/'.\Str::slug($categoryName).'/'.$site_url.'/'.$item->site_url) }}">{{ $item->title }}</a>
                                                @endif
                                            </h2>
                                            <p class="mb-0">
                                                {{ \Str::limit(strip_tags($item->content), 400) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="post-meta">
                                            <span><i class="far fa-calendar-alt"></i> {{ $item->created_at }} </span>
                                            <span><i class="far fa-user"></i> By Admin </span>
                                            <span><i class="far fa-comments"></i>0 Yorum</span>
                                            <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0">
                                                @if($site_url == 'blog' || $site_url == 'hikaye')
                                                    <a href="{{ url('/'.$site_url.'/'.$item->site_url) }}" class="btn btn-xs btn-light text-1 text-uppercase">Yazıya git...</a>
                                                @else
                                                    <a href="{{ url('/'.\Str::slug($categoryName).'/'.$site_url.'/'.$item->site_url) }}" class="btn btn-xs btn-light text-1 text-uppercase">Yazıya git...</a>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <section class="http-error">
                            <div class="row justify-content-center py-3">
                                <div class="col-md-12 text-center">
                                    <div class="http-error-main">
                                        <p>Üzgünüz, bu kategoride henüz bir yazı yayınlanmadı.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

{{--                    <ul class="pagination float-right">--}}
{{--                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>--}}
{{--                    </ul>--}}

                </div>
            </div>
        </div>

    </div>

@endsection
