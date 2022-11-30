@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    <h1>All posts</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a>       
            </li>
        @endforeach
    </ul>       
     {{ $posts->links() }}

@endsection