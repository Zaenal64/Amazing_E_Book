@extends('layout')

@section('body')

@if (session()->has('AddToCartSuccess'))
<div class="container d-flex justify-content-center mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('AddToCartSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container">
    <h3 class="underline-text mb-3">{{__('E-Book Detail')}}</h3>

    <p style="font-weight: bold">{{__('Title')}}: </p>
    <p class="mb-3">{{ $ebook->title }}</p>

    <p style="font-weight: bold">{{__('Author')}}: </p>
    <p class="mb-3">{{ $ebook->author }}</p>

    <p style="font-weight: bold">{{__('Description')}}:</p>
    <p class="mb-3">{{ $ebook->description }}</p>

    <form action="/add-book-to-order/{{ $ebook->ebook_id }}" method="post">
        @csrf
        <button type="submit" class="btn btn-warning">{{__('Rent')}}</button>
    </form>
</div>



@endsection