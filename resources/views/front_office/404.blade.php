@extends('front_office.layouts.master')

@section('content')

    @include('front_office.layouts.breadcrumb', ['not_found' => 1])

    <div class="container">

        <section class="http-error">
            <div class="row justify-content-center py-3">
                <div class="col-md-12 text-center">
                    <div class="http-error-main">
                        <h2>404!</h2>
                        <p>Üzgünüz, aradığınız sayfa mevcut değil.</p>
                        <p>Anasayfaya gitmek için lütfen <a href="{{ url('/') }}">tıklayınız.</a> </p>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
