
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $country->getName() }}</h3>
    </div>
    <div class="card-body">
        <p class="card-text">
            @if($country->hasCurrency())
            {{ __('country.currency_name') }}: {{ $country->getCurrency()->getName() }}
            @else
            {{ __('country.has_no_currency', ['country' => $country->getName()]) }}
            @endif
        </p>
    </div>
</div>
