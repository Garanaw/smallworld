@extends('layouts.app')

@section('content')

@foreach($countries->chunk(3) as $group)
    <div class="card-group mt-5">
    @foreach($group as $country)
        <x-country-card :country="$country" />
    @endforeach
    </div>
@endforeach

@endsection
