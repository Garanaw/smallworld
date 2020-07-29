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
            
            <div class="card-footer">
                <form
                    action="{{ route('currency.delete', ['currency' => $currency->getId()]) }}"
                    method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input
                        type="hidden"
                        name="currency_id"
                        value="{{ $currency->getId() }}">
                    
                    <button class="btn btn-danger">
                        {{ __('currency.delete') }}
                    </buton>
                </form>
            </div>
        </div>
        
    </div>
</div>

@endsection
