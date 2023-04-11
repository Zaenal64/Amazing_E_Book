@extends('layout')

@section('body')
    <div class="container">
        @if ($account->middle_name !== null)
            <p class="underline-text mb-3">{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }}</p>
        @else
            <p class="underline-text mb-3">{{ $account->first_name }} {{ $account->last_name }}</p>
        @endif
        <form action="/update-role-user" method="post">
            @csrf
            <p>Role: </p>
            <select id="role" name="role_id" class="form-control form-select @error('role_id') is-invalid @enderror">
                @if($account->role_id === 1)
                    <option value="Admin" selected>{{__('Admin')}}</option>
                    <option value="User">{{__('User')}}</option>
                @else
                    <option value="Admin">{{__('Admin')}}</option>
                    <option value="User" selected>{{__('User')}}</option>
                @endif
            </select>

            <input type="hidden" name="account_id" value="{{ $account->account_id }}">
            <button class="btn btn-warning mt-3">{{__('Save')}}</button>
        </form>
    </div>
@endsection