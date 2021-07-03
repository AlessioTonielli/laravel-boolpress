@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-4">
            <h3 class="text-capitalize">i tuoi dati:</h3>
            <ul>
                <li>
                    Name: <span class="text-capitalize">{{Auth::user()->name}}</span>
                </li>
                <li>
                    Email: {{Auth::user()->email}}
                </li>
                <li>
                    Registrato in data: {{Auth::user()->created_at}}
                </li>
            </ul>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Scrivi un post</a>
        </div>

        <div class="col-8">
            <h3 class="text-capitalize">I tuoi post:</h3>
            @if(count($posts) > 0)
            @foreach($posts as $post)
            @if($post->user_id == Auth::user()->id)

            <div class="card pt-3 pl-3 pr-3 mb-3">
                <h4 class="text-capitalize">{{ $post->title }}</h4>
                <p>{{ $post->content }}</p>

                <div class="row mb-3">
                    <a href="{{ route('admin.show', ['id' => $post->id]) }}" class="btn btn-primary ml-3">Visualizza Post Completo</a>
                    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-warning ml-3">Modifica</a>

                    <form action="{{ route('admin.destroy', ['id' => $post->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Elimina" class="btn btn-danger ml-3">
                    </form>
                </div>
            </div>
            @endif
            @endforeach
            @else
            
            <h4 class="text-capitalize">Non hai nessun post</h4>
            @endif
            
        </div>


    </div>




</div>



@endsection
