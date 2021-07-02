@extends('layouts.app')


@section('content')
<div style="text-align: center">


<a href="{{ route('admin.show', ['id' => $post->id]) }}" class="btn btn-primary">Torna indietro</a>

<form action="{{ route('admin.update', ['id' => $post->id])  }}" method="post">

    @csrf
    @method('PUT')

    <label for="title">Titolo</label><br>
    <input type="text" id="title" name="title" value="{{ $post->title }}"><br>

    <label for="content">Contenuto</label><br>
    <textarea name="content" id="content" cols="30" rows="10"">{{ $post->content }}</textarea><br>


    <input type="submit" value="Modifica" class="btn btn-primary">

</form>
</div>

@endsection
