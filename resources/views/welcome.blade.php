@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-center sm:justify-start sm:pt-0">
        <img class="rounded mx-auto d-block" src="{{ asset('images/Logo.jpg') }}" height="360px" />
    </div>
    @if (Auth::check())
    <div class="card-body text-center">
        <a href="/home" class="btn btn-primary">Dashboard</a>
    </div>
    @endif
</div>
</div>
@endsection
