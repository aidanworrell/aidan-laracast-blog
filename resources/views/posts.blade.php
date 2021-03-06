<!doctype html>

<title> My Blog</title>
<link rel="stylesheet" href="/app.css">
<body>
@extends('layout')
@section('content')
    @foreach ($posts as $post)
        {{--        @dd($loop)--}}
        <article>
            <h1>
                <a
                    href="/posts/{{$post->slug}}">
                    {!! $post->title !!}
                </a>


            </h1>
            <p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->categories->name }}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
            <div>
                <?= $post->date; ?>
            </div>
        </article>

    @endforeach
@endsection
{{--<article>--}}

{{--    <h1><a href="/posts/my-first-post"> My First Post</a></h1>--}}

{{--    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make--}}
{{--        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing--}}
{{--        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions--}}
{{--        of Lorem Ipsum </p>--}}
{{--</article>--}}

{{--<article>--}}

{{--    <h1><a href="/posts/my-second-post"> My Second Post</a></h1>--}}

{{--    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make--}}
{{--        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing--}}
{{--        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions--}}
{{--        of Lorem Ipsum </p>--}}
{{--</article>--}}
{{--<article>--}}

{{--    <h1><a href="/posts/my-thrid-post"> My Third Post</a></h1>--}}

{{--    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make--}}
{{--        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing--}}
{{--        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions--}}
{{--        of Lorem Ipsum </p>--}}
{{--</article>--}}
</body>
