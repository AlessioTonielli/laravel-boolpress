@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <h1>Benvenuto in BoolBlog</h1>
    </div>

    <div class="row justify-content-center">
        @guest
        <a href="{{ route('guest.index') }}" class="text-uppercase">vai ai post</a>
        @else
        <a href="{{ route('admin.index') }}" class="text-uppercase">vai ai post</a>
        @endguest
    </div>
</div>


@endsection
