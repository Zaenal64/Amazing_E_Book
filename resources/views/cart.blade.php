@extends('layout')

@section('body')

@if (session()->has('deleteOrderSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleteOrderSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container w-50">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Title')}}</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            @if(count($cart_list) !== 0)
                @foreach ($cart_list as $cart)
                    <tr>
                        <td><a href="/book-page/{{ $cart->ebook->ebook_id }}">{{ $cart->ebook->title }}</a></td>
                        <td>
                            <form action="/delete_book" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $cart->order_id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{__('You have nothing in your cart')}}</td>
                </tr>
            @endif
        </tbody>
    </table>

    @if(count($cart_list) !== 0)
        <form action="/submit-all-cart" method="post" class="text-center">
            @csrf
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    @endif
</div>

@endsection