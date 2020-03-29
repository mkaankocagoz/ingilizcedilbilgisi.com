@extends('back_office.layouts.master')

@section('content')

    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Ana Menu</a></li>
        <li class="breadcrumb-item">Sayfalar</li>
        <li class="breadcrumb-item active">{{ $page_name->page_name }}</li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> {{ $page_name->page_name }} İçerikleri
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div id="panel-1" class="panel" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                <div class="panel-hdr">
                    <h2>
                        Tüm Makaleler
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                        <div class="row no-gutters">

                            <table class="table m-0 table-dark table-hover table-striped table-bordered" id="table-list">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Gösterim</th>
                                    <th>Sıralama</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($articles))
                                    @foreach($articles as $item)
                                <tr>
                                    <td style="vertical-align: middle;" width="50%">{{ \Str::limit($item->title, 60) }}</td>
                                    <td style="vertical-align: middle;" align="center">0</td>
                                    <td style="vertical-align: middle;" align="center">1</td>
                                    <td style="vertical-align: middle;" align="center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" @if($item->status == 1)checked @endif onclick="changeStatus({{ $item->id }})">
                                            <label class="custom-control-label" for="customSwitch{{$item->id}}" id="labelStatus{{$item->id}}">@if($item->status == 1)Aktif @else Pasif @endif</label>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;" width="17%">
                                        <a class="btn btn-light" href="{{ url('/admin/pages/edit/'.$item->id) }}">Düzenle</a>
                                        <a class="btn btn-light" href="{{ url('/admin/pages/delete/'.$item->id) }}">Sil</a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('/admin/pages/create/'.$id) }}" class="btn btn-primary" style="margin-top: 10px;"> Makale Ekle </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('back_assets/css/toastr.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('back_assets/js/toastr.min.js') }}"></script>
    @if(\Session::has('status_success'))
        <script>
            toastr.success('Kayıt işlemi başarıyla gerçekleştirildi.', 'Sistem Mesajı!')
        </script>
    @endif
    @if(\Session::has('status_error'))
        <script>
            toastr.warning('Kayıt esnasında bir hata oluştu!', 'Sistem Mesajı!')
        </script>
    @endif

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeStatus(id) {
            $.ajax({
                url: '{{url('/admin/pages/list/changeStatus')}}',
                data: {id:id},
                type: "post",
                success: function(data) {
                    toastr.success(data.data.message, 'Sistem Mesajı!')
                    if(data.data.status === 1)
                        $('#labelStatus'+data.data.id).text('Aktif');
                    else
                        $('#labelStatus'+id).text('Pasif');

                },
            });
        }
    </script>

@endsection

