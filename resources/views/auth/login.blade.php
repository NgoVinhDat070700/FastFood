{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
@extends('layouts.master_layout')
@section('content')
    <div class="cart-box-main">
    @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('message')}}
        </div>
    @endif
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Account Login</h3>
                </div>
                <x-jet-validation-errors class="mb-4" />
                <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                <form class="mt-3 collapse review-form-box" id="formLogin" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" :value="old('email')" required autofocus > </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="current-password"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Login</button>
                </form>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Create New Account</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                <form class="mt-3 collapse review-form-box" id="formRegister" method="post" action="{{route('register')}}">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Name</label>
                                <input type="text" class="form-control" name = "name" id="name" placeholder="Tên đăng nhập" :value="name" required autofocus autocomplete="name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" placeholder="Mật khẩu" required autocomplete="new-password"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
</x-guest-layout>
