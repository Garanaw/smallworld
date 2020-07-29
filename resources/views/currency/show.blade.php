@extends('layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-12">
        <h1>
            {{ __('currency.show_title', [
                'name' => $currency->getName(),
            ]) }}
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-4 offset-4">
        
        <div class="card mt-5">
            <div class="card-header">
                {{ $currency->getName() }}
            </div>

            <div class="card-body">
                {{ __('currency.country') }}: {{ $currency->getCountry()->getName() }}
            </div>
        </div>
        
    </div>
</div>

@endsection
