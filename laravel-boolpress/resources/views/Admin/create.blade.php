@extends('layouts.app')

@section('content')

<form action="{{ route("admin.store") }}" method="post">

@csrf

<div>

    <label for="title">Titolo</label><br>
    <input type="text" id="title" name="title">
</div>

<div>

    <label for="content">Contenuto</label><br>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
</div>


<input type="submit" value="Crea post">

</form>


@endsection