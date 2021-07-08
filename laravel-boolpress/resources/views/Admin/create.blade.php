@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if(url()->previous() == route('admin.private'))
        <a href="{{ route('admin.private') }}" class="btn btn-primary text-capitalize">Torna alla tua area privata</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn btn-primary text-capitalize">Torna Indietro</a>
        @endif
    </div>

    <div class="row justify-content-center">
        <form action="{{ route("admin.store") }}" method="post" enctype="multipart/form-data">

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

                    <option value="{{ $category->id }}" class="text-capitalize">{{ $category->name }}</option>

                    @endforeach

                </select>
                <div class="form-control">

                    @foreach($tags as $tag)
                    <label for="tag">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        {{ $tag->name }}

                    </label>
                    @endforeach

                </div>
            </div>

            <div class="form-group">

                <label for="file">Img Post
                    <input type="file" name="cover_url" class="form-control-life" id="file">
                </label>


            </div>

            <div class="form-group">
                <input type="submit" value="Crea post" class="form-control btn btn-success text-capitalize">
            </div>

        </form>
    </div>

</div>


@endsection
