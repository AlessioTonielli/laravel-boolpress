@extends('layouts.app')

@section('content')
<div style="text-align: center">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('guest.index') }}" class="btn btn-primary">Torna Indietro</a>

   

    


</div>
@endsection