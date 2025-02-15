@extends('layouts.app')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}">Anasayfa</a></li>
                <li class="active">Giriş Yap</li>
            </ol>
        </div>
    </div>
</div>

<div class="account">
    <div class="container">
    <div class="account-top heading">
            <h2>GİRİŞ YAP</h2>
        </div>
        <div class="account-main">
            <div class="col-md-6 account-left">
                <h3>Mevcut Kullanıcı</h3>
                <div class="account-bottom">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <input placeholder="E-posta adresi" name="email" value="{{ old('email')}}" type="text" tabindex="3" required>                    
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                    <input placeholder="Parola" name="password" type="password" tabindex="4" required>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="address">
                        <input type="submit" value="Giriş Yap">
                    </div>
                </form>
                </div>
            </div>
            <div class="col-md-6 account-right account-left">
                <h3>Yeni Kullanıcımısın = Kayıt Ol</h3>
                <p></p>
                <a href="{{route('register')}}">Ücretsiz Kayıt</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection