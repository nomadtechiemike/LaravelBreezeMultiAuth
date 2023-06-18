@extends('layouts.header')
@section('title', 'Register page')


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
                                    <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" :value="__('name')"
                                                class="form-label">Username</label>
                                            <input type="text" name="name" :value="old('name')" required
                                                autofocus autocomplete="name" class="form-control"
                                                placeholder="Username" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" :value="__('email')" class="form-label">Email
                                                address</label>
                                            <input type="email" class="form-control" id="userEmail" name="email"
                                                :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" :value="__('Password')"
                                                class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="userPassword" autocomplete="current-password"
                                                placeholder="Password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" :value="__('Confirm Password')"
                                                class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required autocomplete="new-password" placeholder="Confirm Password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-primary-button
                                                class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                {{ __('Register') }}
                                            </x-primary-button>

                                        </div>
                                        <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a
                                            user? Sign in</a>
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
