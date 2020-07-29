@extends('layouts.app')

@section('content')

<h1 class="text-center">
    {{ __('currency.create_title') }}
</h1>

<form class="row mt-5" action="{{ route('currency.store') }}" method="POST">
    @csrf
    
    <div class="col-4">
        <input
            type="text"
            class="form-control @error('currency_name') is-invalid @enderror"
            name="currency_name"
            placeholder="{{ __('currency.name') }}">
        
        @error('currency_name')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-4">
        <select name="country_id" class="form-control">
            @foreach($countries as $country)
            <x-currency-option :country="$country" />
            @endforeach
        </select>
        
        @error('country_id')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-success">
        {{ __('currency.create') }}
    </button>
</form>

@endsection
