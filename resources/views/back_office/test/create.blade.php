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
        <li class="breadcrumb-item active">Test</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Test Ekle
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
                        <form method="post" action="{{ url('/admin/pages/create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="test_title">Test Başlığı</label>
                                <input type="text" id="test_title" name="test_title" class="form-control" placeholder="Test Başlığı" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="example-select">Kategori Seç</label>
                                <select class="form-control" id="example-select">
                                    <option>Seçiniz...</option>
                                </select>
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

