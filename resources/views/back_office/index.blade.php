@extends('back_office.layouts.master')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Ana Menu</a></li>
        <li class="breadcrumb-item active">Makaleler</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Sayfa Listesi
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-1" class="panel" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                <div class="panel-hdr">
                    <h2>
                        Sayfalar
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                        <div class="row no-gutters">

                            <ul>
                                <li><a href="{{ url('/admin/pages/list/1') }}">ANA SAYFA</a></li>
                                <hr>
                                <li><a href="javascript:void(0)">GRAMER</a>
                                    <ul>
                                        <li><a href="{{ url('/admin/pages/list/3') }}">Başlangıç Seviye Gramer</a></li>
                                        <li><a href="javascript:void(0)">Orta Seviye Gramer</a></li>
                                        <li><a href="javascript:void(0)">İleri Seviye Gramer</a></li>
                                    </ul>
                                </li>
                                <hr>
                                <li><a href="javascript:void(0)">KELİME</a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Yakın Anlamlı Kelimeler</a></li>
                                        <li><a href="javascript:void(0)">Bağlaçlar</a></li>
                                        <li><a href="javascript:void(0)">Önemli Fiiler</a></li>
                                        <li><a href="javascript:void(0)">Edatlar</a></li>
                                    </ul>
                                </li>
                                <hr>
                                <li><a href="javascript:void(0)">HİKAYE</a></li>
                                <hr>
                                <li><a href="javascript:void(0)">BLOG</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
