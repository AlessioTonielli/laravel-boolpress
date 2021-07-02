@extends('layouts.app')

@section('content')
<h1>dentro il file index.blade.php (non admin)</h1>
@foreach($posts as $post)

    <div style="text-align: center">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
@endforeach
@endsection