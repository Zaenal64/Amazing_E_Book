@extends('layout')

@section('body')

<div class="container py-4 text-center custom-height">
    <h1>{{ $message }}</h1>
    <p><a href="/">{{__('Click here to')}} "{{__('Home')}}"</p></a>
</div>

@endsection