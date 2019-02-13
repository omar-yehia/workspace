{{--@extends('layouts.app')--}}
@extends('workspace.layouts.master')

@section('pageContent')
{{--@section('content')--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" autocomplete="on">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           placeholder="ex: name99"
                                           class="form-control{{ $errors->has('name') ? ' alert alert-danger' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           placeholder="ex: abc@example.com"
                                           class="form-control{{ $errors->has('email') ? 'alert alert-danger' : '' }}"
                                           name="email" value="{{ old('email') }}" >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           placeholder="minimum length = 6"
                                           class="form-control{{ $errors->has('password') ? ' alert alert-danger' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' alert alert-danger' : '' }}"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Enter Mobile') }}</label>

                                <div class="col-md-6 ">
                                    <input type="text" class="form-control {{ $errors->has('user_mobile') ? ' alert alert-danger' : '' }}" id="user_mobile"
                                           placeholder="ex: 01 xxx xxx xxx"
                                           name="user_mobile">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="user_type"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Choose Account Type') }}</label>

                                <div class="">

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="user_type" value="3" checked>User
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="user_type" value="2">Space
                                            Owner
                                        </label>
                                    </div>

                                </div>

                            </div>
                            {{--<div class="col-md-6 ">--}}
                            {{--<input type="number" min="" max="2" value="2" class="form-control" id="user_type"--}}
                            {{--name="user_type">--}}
                            {{--</div>--}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
