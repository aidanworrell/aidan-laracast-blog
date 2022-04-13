@extends('layout')

@section('content')
    <!doctype html>

<article>

    <h1>{!! $post->title !!}</h1>

    <p>
        <a href="/categories/{{ $post->categories->id }}">{{ $post->categories->name }}</a>
    </p>

    <div>
        {!! $post->body !!}
    </div>

</article>

<a href="/">Go Back</a>


@endsection
