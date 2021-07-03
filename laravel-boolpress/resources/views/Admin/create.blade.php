@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if(url()->previous() == route('admin.private'))
        <a href="{{ route('admin.private') }}" class="btn btn-primary">Torna Indietro</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>
        @endif
    </div>

    <div class="row justify-content-center">
        <form action="{{ route("admin.store") }}" method="post">

            @csrf

            <div class="form-group">

                <label for="title">Titolo</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>

            <div class="form-group">

                <label for="content">Contenuto</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">

                <select name="category_id" id="" class="form-control">

                    <option value="">-- Seleziona La Categoria</option>
                    @foreach($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Crea post" class="form-control btn btn-success">
            </div>

        </form>
    </div>

</div>


@endsection
