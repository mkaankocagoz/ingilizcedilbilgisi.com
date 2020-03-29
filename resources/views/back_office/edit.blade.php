@extends('back_office.layouts.master')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Ana Menu</a></li>
        @if($main_page != "")<li class="breadcrumb-item">{{ $main_page->page_name }}</li>@endif
        <li class="breadcrumb-item active">{{ $page->page_name }}</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> {{ $page->page_name }}
        </h1>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>General</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form method="post" action="{{ url('/admin/pages/update') }}">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article_id }}">
                            <input type="hidden" name="page_id" value="{{ $page_id }}">
                            <div class="form-group">
                                <label class="form-label" for="keywords">Anahtar Kelimeler</label>
                                <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Anahtar Kelimeler..." value="{{ $article->keywords }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="descriptions">Açıklamalar</label>
                                <input type="text" id="descriptions" name="descriptions" class="form-control" placeholder="Açıklamalar..." value="{{ $article->description }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="title">Başlık</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Başlık..." value="{{ $article->title }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="contents">İçerik</label>
                                <textarea id="contents" name="contents" placeholder="Makale İçeriği..." >{{ $article->content }}</textarea>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary waves-effect waves-themed">EKLE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#contents').summernote({
                height: ($(window).height() - 300),
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    }
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: '{{url('/admin/pages/create/addImage')}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function(url) {
                        $('#contents').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>

@endsection
