@extends('layouts.header')
@section('title', 'Login page')


<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper">

                                </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#"
                                        class="noble-ui-logo logo-light d-block mb-2">Noble<span>UI</span></a>
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="userEmail" id="email" name="email" :value="__('Email')" class="form-label">Email
                                                address</label>
                                            <input type="email" class="form-control" id="userEmail" name="email"
                                                :value="old('email')" required autofocus autocomplete="username"
                                                placeholder="Email">
                                                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" :value="__('Password')"
                                                class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="userPassword"
                                                autocomplete="current-password" placeholder="Password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="authCheck">
                                            <label class="form-check-label" for="authCheck">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                        <div>
                                            <x-primary-button class="btn bs-btn-bg btn-primary me-2 mb-2 mb-md-0 text-white">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                           

                                        </div>
                                        <a href="{{ route('register') }}"
                                            class="d-block mt-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Not
                                            a user? Sign up</a>
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('layouts.footer')
