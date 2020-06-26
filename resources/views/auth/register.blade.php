@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                <p class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                                <p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                <p class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                            <p class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</p>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob">
                            </div>
                            <p class="text-danger">{{ $errors->has('dob') ? $errors->first('dob') : '' }}</p>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <p class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</p>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4 form-control-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <div class="form-check-inline form-check">
                                    <label class="form-check-label" style="margin-right: 5px;">
                                        <input type="radio" id="inline-radio1" name="gender" value="male" class="form-check-input">
                                        Male
                                    </label>
                                    <label class="form-check-label ">
                                        <input type="radio" id="inline-radio2" name="gender" value="female" class="form-check-input">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="photo">
                            </div>
                            <p class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</p>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
