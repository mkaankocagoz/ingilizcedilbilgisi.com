@extends('back_office.layouts.master')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Ana Menu</a></li>
        <li class="breadcrumb-item">Testler</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Testler
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Tüm Testler
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Kategori</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($tests))
                                @foreach($tests as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $item->title }}</td>
                                        <td style="vertical-align: middle;"> - </td>
                                        <td style="vertical-align: middle;" width="5%">
                                            <a class="btn btn-light" href="#">Düzenle</a>
                                            <a class="btn btn-light" href="#">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{ url('/admin/tests/add') }}" class="btn btn-primary" style="margin-top: 10px;"> Test Ekle </a>
        </div>
    </div>


@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('back_assets/css/toastr.min.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('back_assets/css/datatables.bundle.css') }}">
@endsection

@section('js')
    <script src="{{ asset('back_assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });
        });
    </script>

@endsection

