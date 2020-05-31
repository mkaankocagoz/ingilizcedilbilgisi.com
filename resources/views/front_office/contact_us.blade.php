@extends('front_office.layouts.master')

@section('content')

    <style>
        .form-control {
            border-color: rgba(14, 14, 14, 0.22);
        }
    </style>

    <section class="page-header page-header-classic">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">ANASAYFA</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col p-static">
                    <span class="page-header-title-border visible" style="width: 196.703px;"></span><h1 data-title-border="">İletişim</h1>

                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">

            @include('front_office.layouts.right_menu')

            <div class="col-lg-9">
                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;"><strong class="font-weight-extra-bold">Bize</strong> Ulaş</h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="400" style="animation-delay: 400ms;">Soru sormaktan çekinmeyin. En kısa sürede geri dönüş yapacağız.</p>
                </div>
                <form id="contactForm" class="contact-form" action="{{ url('/iletisim') }}" method="POST" novalidate="novalidate">
                    @csrf
                    @if(\Session::has('status'))
                        @if(\Session::get('status') == 1)
                            <div class="contact-form-success alert alert-success mt-4" id="contactSuccess">
                                <strong>Başarılı!</strong> Mesajınız başarılı bir şekilde gönderildi.
                            </div>
                        @else
                            <div class="contact-form-error alert alert-danger mt-4" id="contactError">
                                <strong>Hata!</strong> Mesaj gönderiminde bir hata oluştu lütfen tekrar deneyiniz.
                                <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                            </div>
                        @endif
                    @endif


                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Ad Soyad</label>
                            <input type="text" value="{{ old('name') }}" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required="">
                            @if($errors->any())
                                <span class="mail-error-message text-1 d-block text-danger" id="mailErrorMessage">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Email Adresi</label>
                            <input type="email" value="{{ old('email') }}" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required="">
                            @if($errors->any())
                                <span class="mail-error-message text-1 d-block text-danger" id="mailErrorMessage">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold text-dark text-2">Konu</label>
                            <input type="text" value="{{ old('subject') }}" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required="">
                            @if($errors->any())
                                <span class="mail-error-message text-1 d-block text-danger" id="mailErrorMessage">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold text-dark text-2">Mesaj</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" id="message" required="">{{ old('message') }}</textarea>
                            @if($errors->any())
                                <span class="mail-error-message text-1 d-block text-danger" id="mailErrorMessage">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="Gönder" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
