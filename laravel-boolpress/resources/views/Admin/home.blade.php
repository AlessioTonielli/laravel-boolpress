@extends('layouts.app')

@section('content')

{{-- <div style="text-align: center">


    @foreach($posts as $post)

    <div style="text-align: center; border: 1px solid black">
        <h2>{{ $post->title }}</h2>
<p>{{ $post->content }}</p>
<a href="{{ route('admin.show', ['id' => $post->id]) }}">Visualizza Post Completo</a>

</div>
@endforeach

</div> --}}

{{-- @guest
<a href="{{ route('guest.index') }}">
    vai ai post
</a>
@else
<a href="{{ route('admin.index') }}">
    vai ai post
</a>
@endguest --}}

benvenuto nella tua home Admin

<a href="{{ route('admin.index') }}">
    vai ai post
</a>

@endsection