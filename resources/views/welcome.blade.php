@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            {{ config('app.name') }}
        </div>

        <div class="links">
            <a href="{{ route('currency.create') }}">Add a new currency</a>
            <a href="https://github.com/Garanaw/smallworld" target="_blank">
                View in GitHub
            </a>
            <a href="https://github.com/Garanaw">View my github</a>
        </div>
    </div>
</div>

@endsection
