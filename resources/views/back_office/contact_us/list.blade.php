@extends('back_office.layouts.master')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Ana Menu</a></li>
        <li class="breadcrumb-item">Mesajlar</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Mesajlar
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Tüm Mesajlar
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Email</th>
                                <th>Konu</th>
                                <th>İçerik</th>
                                <th>Tarih</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($contacts))
                                @foreach($contacts as $item)
                                    <tr>
                                        <td style="vertical-align: middle;" align="center">{{ $item->full_name }}</td>
                                        <td style="vertical-align: middle;" align="center">{{ $item->email }}</td>
                                        <td style="vertical-align: middle;" align="center">{{ $item->subject }}</td>
                                        <td style="vertical-align: middle;" width="50%">{{ $item->message }}</td>
                                        <td style="vertical-align: middle;" align="center">{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td style="vertical-align: middle;" width="5%">
                                            <a class="btn btn-light" href="{{ url('/admin/contact-us/delete/'.$item->id) }}">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

