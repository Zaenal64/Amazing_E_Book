@extends('layout')

@section('body')

    @auth
        <div class="container w-80">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{__('Author')}}</th>
                        <th scope="col">{{__('Title')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ebook as $book)
                        <tr>
                            <td>{{ $book->author }}</td>
                            <td><a href="/book-page/{{ $book->ebook_id }}">{{ $book->title }}</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <div class="container py-4 text-center custom-height">
            <h2>{{ __('Find and Rent Your E-Book Here!') }}</h2>
        </div>
    @endauth
@endsection
