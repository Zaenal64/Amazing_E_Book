@extends('layout')

@section('body')

<div class="container text-center mb-3">
    @php
        // dd(auth()->user()->gender)
    @endphp
    @if(auth()->user()->display_picture_link === null)
        <img src="{{ URL::asset('images/profile-pic/no-image.jpg') }}" alt="" height="300px">
    @else
    <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->display_picture_link)}}" alt="profile_image"
    style="width: 120px;height: 120px; padding: 10px; margin: 0px; ">
    @endif
</div>

<form action="/update-profile" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <div class="col">
            <div class="mb-3">
                <label for="first_name" class="form-label">{{__('First Name')}}</label>
                <input type="text" name="first_name" class="form-control rounded-top @error('first_name') is-invalid @enderror" id="first_name" value="{{ auth()->user()->first_name }}" autofocus required>

                @error('first_name')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">{{__('Last Name')}}</label>
                <input type="text" name="last_name" class="form-control rounded-top @error('last_name') is-invalid @enderror" id="last_name" value="{{ auth()->user()->last_name }}" required>

                @error('last_name')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <p class="form-label">{{__('Gender')}}</p>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <label class="form-check-label" for="gender_id">{{__('Male')}}</label>
                        @if(auth()->user()->gender_id === 1)
                            <input class="form-check-input" type="radio" name="gender_id" id="gender_id" value="male" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender_id" id="gender_id" value="male">
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="gender_id">{{__('Female')}}</label>
                        @if(auth()->user()->gender_id === 2)
                            <input class="form-check-input" type="radio" name="gender_id" id="gender_id" value="female" checked>
                        @else
                            <input class="form-check-input" type="radio" name="gender_id" id="gender_id" value="female">
                        @endif
                    </div>
                </div>

                @error('gender_id')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{__('Password')}}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="middle_name" class="form-label">{{__('Middle Name')}}</label>
                @if(auth()->user()->middle_name === null)
                    <input type="text" name="middle_name" class="form-control rounded-top @error('middle_name') is-invalid @enderror" id="last-name" value="">
                @else
                    <input type="text" name="middle_name" class="form-control rounded-top @error('middle_name') is-invalid @enderror" id="last-name" value="{{ auth()->user()->middle_name }}">
                @endif
                @error('middle_name')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{__('Email Address')}}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email" id="email" placeholder="name@example.com" value="{{ auth()->user()->email }}" required >
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <fieldset disabled>
                    <label for="disabledSelect" class="form-label">{{__('Role')}}</label>
                    <select id="disabledSelect"  class="form-control form-select @error('role_id') is-invalid @enderror">
                        @if(auth()->user()->role_id === 1)
                            <option value="Admin" selected>{{__('Admin')}}</option>
                            <option value="User">{{__('User')}}</option>
                        @else
                            <option value="Admin">{{__('Admin')}}</option>
                            <option value="User" selected>{{__('User')}}</option>
                        @endif
                    </select>

                    @error('role_id')
                            <div class="invalid-feedback d-block text-start">
                                {{ $message }}
                            </div>
                    @enderror

                </fieldset>
            </div>

            <div class="mb-3">
                <label for="display_picture_link" class="form-label">{{__('Display Picture')}}</label>
                <input type="file" class="form-control form-control-sm" id="display_picture_link" name="display_picture_link">

                @error('display_picture_link')
                    <div class="invalid-feedback d-block text-start">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="container text-center">
        <button type="submit" class="btn btn-info mb-2">{{__('Save')}}</button>
    </div>
</form>

@endsection
