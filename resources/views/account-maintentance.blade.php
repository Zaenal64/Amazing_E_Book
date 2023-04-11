@extends('layout')

@section('body')

@if (session()->has('deleteUserSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleteUserSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

    
<div class="container w-100">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Account')}}</th>
                <th scope="col">{{__('Action')}}</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($account as $acc)
                <tr>
                    @if ($acc->middle_name !== null)
                        <td>{{ $acc->first_name }} {{ $acc->middle_name }} {{ $acc->last_name }} - {{ __($acc->role->role_desc) }}</td>
                    @else
                        <td>{{ $acc->first_name }} {{ $acc->last_name }} - {{ __($acc->role->role_desc) }}</td>
                    @endif
                    <td>
                        <a href="/update-role/{{ $acc->account_id }}" class="btn btn-info">{{__('Update Role')}}</a>
    
                    </td>
                    <td>
                        <form action="/delete-user" method="post">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $acc->account_id }}">
                            <button class="btn btn-danger">{{__('Delete User')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection