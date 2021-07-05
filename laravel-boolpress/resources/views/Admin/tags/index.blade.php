@extends('layouts.app')

@section('content')


<div class="container">


    @foreach($tags as $tag)
    <div class="row mb-3">
        <ul class="list-group">
            <li class="list-group-item text-capitalize">Titolo: {{ $tag->name }}</li>
            <li class="list-group-item text-capitalize">Slug: {{ $tag->slug }}</li>
        </ul>
        {{-- <div class="card p-3 mb-3 col-12">
        <h3 class="text-capitalize">Nome: {{ $tag->name }}</h3>
        <div class="row">
            <div class="col-3">
                <h4 class="text-capitalize">slug: {{ $tag->slug }}</h4>
            </div>
        </div>
    </div> --}}
</div>


@endforeach

</div>
@endsection
