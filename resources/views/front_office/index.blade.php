@extends('front_office.layouts.master')

@section('content')

    <div class="container py-4">
        <div class="row">

            @include('front_office.layouts.right_menu')

            <div class="col-lg-9 order-lg-1">
                <section class="http-error">
                    <div class="row justify-content-center py-3">
                        <div class="col-md-12 text-center">
                            <div class="http-error-main">
                                <p>Ana Sayfa halen yapım aşamasında</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    @endsection
