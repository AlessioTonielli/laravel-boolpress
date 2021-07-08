@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">

        @if(url()->previous() == route('admin.private'))
        <a href="{{ route('admin.private') }}" class="btn text-capitalize btn-primary">Torna alla tua area privata</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn text-capitalize btn-primary">Torna Indietro</a>
        @elseif(url()->previous() == route('admin.show', ['id' => $post->id]))
        <a href="{{ route('admin.show', ['id' => $post->id]) }}" class="btn text-capitalize btn-primary">Torna Indietro</a>
        @endif
    </div>

    <div class="row justify-content-center">
        <form action="{{ route('admin.update', ['id' => $post->id])  }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="form-group">

                <label for="title">Titolo</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label><br>
                <textarea name="content" id="content" cols="30" rows="10"" class=" form-control" requied>{{ $post->content }}</textarea>
            </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="category_id" id="category" class="form-control">

                        <option value="">-- Seleziona La Categoria</option>
                        @foreach($categories as $category)

                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                        @endforeach

                    </select>
                </div>
                @foreach($tags as $tag)
                <label for="tag">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                {{ $tag->name }}
                </label>
                @endforeach

                <div class="form-group">

                <label for="file">Img Post
                    <input type="file" name="cover_url" class="form-control-life" id="file">
                </label>


            </div>

                <div class="form-group">
                    <input type="submit" value="Modifica" class="form-control btn btn-success text-capitalize">
                </div>

        </form>
    </div>

</div>

@endsection
