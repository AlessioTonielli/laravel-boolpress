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

<select name="category_id" id="">

<option value="">-- Seleziona La Categoria</option>
@foreach($categories as $category)

<option value="{{ $category->id }}">{{ $category->name }}</option>
    
@endforeach

</select>
<br>
<input type="submit" value="Crea post">

</form>


@endsection