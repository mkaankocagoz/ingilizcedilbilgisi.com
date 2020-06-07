@extends('front_office.layouts.master')

@section('content')

    @include('front_office.layouts.breadcrumb', ['categoryName' => $categoryName, 'page' => $page, 'article' => $article, 'sub_url' => $site_url])

    <div class="container py-4">
        <div class="row">

            @include('front_office.layouts.right_menu', ['sub_url' => $site_url])

            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">

                    @if(isset($article))
                        <article class="post post-large blog-single-post border-0 m-0 p-0">
                            <div class="post-image ml-0">
                                <a href="blog-post.html">
                                    <img src="{{ asset('front_assets/img/subject_img/'.$article->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                                </a>
                            </div>

                            <div class="post-date ml-0">
                                <span class="day">{{ date('d', strtotime($article->created_at)) }}</span>
                                <span class="month">
                                    @php
                                        $aylar = array(
                                            'Ocak',
                                            'Şubat',
                                            'Mart',
                                            'Nisan',
                                            'Mayıs',
                                            'Haziran',
                                            'Temmuz',
                                            'Ağustos',
                                            'Eylül',
                                            'Ekim',
                                            'Kasım',
                                            'Aralık'
                                        );
                                        $ay = $aylar[date('m', strtotime($article->created_at)) - 1];
                                        echo $ay;
                                    @endphp
                                </span>
                            </div>

                            <div class="post-content ml-0">

                                <h2 class="font-weight-bold"><a href="blog-post.html">Class aptent taciti sociosqu ad litora torquent</a></h2>

                                <div class="post-meta">
                                    <span><i class="far fa-user"></i> By Admin </span>
                                    <span><i class="far fa-comments"></i> 0 Yorum</span>
                                </div>



                                <div class="row">
                                    {!! $article->content !!}
                                </div>



{{--                                <div class="post-block mt-5 post-share">--}}
{{--                                    <h4 class="mb-3">Share this Post</h4>--}}

{{--                                    <!-- AddThis Button BEGIN -->--}}
{{--                                    <div class="addthis_toolbox addthis_default_style ">--}}
{{--                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>--}}
{{--                                        <a class="addthis_button_tweet"></a>--}}
{{--                                        <a class="addthis_button_pinterest_pinit"></a>--}}
{{--                                        <a class="addthis_counter addthis_pill_style"></a>--}}
{{--                                    </div>--}}
{{--                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>--}}
{{--                                    <!-- AddThis Button END -->--}}

{{--                                </div>--}}

                                @php $comments = \App\Helper\CommentHelper::comments($article->id)  @endphp

                                @if($comments)
                                    <div id="comments" class="post-block mt-5 post-comments">
                                        <h4 class="mb-3">Yorumlar</h4>

                                        <ul class="comments">
                                            @foreach($comments as $item)
                                                <li style="padding: 10px 0 0 0px;">
                                                    <div class="comment">
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
                                                                <strong>{{ $item['full_name'] }}</strong>
{{--                                                                    <span class="float-right">--}}
{{--                                                                        <span> <a href="#"><i class="fas fa-reply"></i> Cevapla</a></span>--}}
{{--                                                                    </span>--}}
                                                                </span>
                                                            <p>{{ $item['content'] }}</p>
                                                            <span class="date float-right">{{ $item['created_date'] }}</span>
                                                        </div>
                                                    </div>
{{--                                                    @if(isset($item['sub_comment']))--}}
{{--                                                    <ul class="comments reply">--}}
{{--                                                        <li style="padding: 10px 0 0 70px;">--}}
{{--                                                            <div class="comment">--}}
{{--                                                                <div class="comment-block">--}}
{{--                                                                    <div class="comment-arrow"></div>--}}
{{--                                                                    <span class="comment-by">--}}
{{--                                                                        <strong>{{ $item['sub_comment']['full_name'] }}</strong>--}}
{{--                                                                    </span>--}}
{{--                                                                    <p>{{ $item['sub_comment']['content'] }}</p>--}}
{{--                                                                    <span class="date float-right">{{ $item['sub_comment']['created_date'] }}</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                    @endif--}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif

                                <div class="post-block mt-5 post-leave-comment">
                                    <form id="contactForm" class="contact-form p-4 rounded bg-color-grey" action="{{url('post-comment')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <div class="p-2">
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="required font-weight-bold text-dark">Ad Soyad</label>
                                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required="">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark">E-Mail Adresi</label>
                                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="required font-weight-bold text-dark">Yorum</label>
                                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" id="message" required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col mb-0">
                                                    <input type="submit" value="Yorumu Kaydet" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </article>
                    @endif
                </div>
            </div>


        </div>
    </div>

@endsection
