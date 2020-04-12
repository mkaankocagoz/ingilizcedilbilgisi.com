@extends('back_office.layouts.master')

@section('content')

    <style class="cp-pen-styles">
        body
        {
            background-color:#f5f5f5;
        }
        .imagePreview {
            width: 100%;
            height: 180px;
            background-position: center center;
            background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .btn-primary
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
        .del
        {
            position:absolute;
            top:0px;
            right:15px;
            width:30px;
            height:30px;
            text-align:center;
            line-height:30px;
            background-color:rgba(255,255,255,0.6);
            cursor:pointer;
        }
        .imgAdd
        {
            width:30px;
            height:30px;
            border-radius:50%;
            background-color:#4bd7ef;
            color:#fff;
            box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
            text-align:center;
            line-height:30px;
            margin-top:0px;
            cursor:pointer;
            font-size:15px;
        }
    </style>

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
                        <form method="post" action="{{ url('/admin/pages/update') }}"  enctype="multipart/form-data">
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
                                <label class="form-label" for="title">Site URL</label>
                                <input type="text" id="site_url" name="site_url" class="form-control" placeholder="Site URL..." value="{{ $article->site_url }}" required>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Resim Yükle <input type="file" class="uploadFile img" id="image" name="image" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
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

        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
    </script>

@endsection
