@extends('layouts.app')

@section('content')
<div class="container pt-4 pb-5">
    <h1 class="text-white mb-4">Оформление заказа</h1>

    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body p-4">
                    <h5 class="text-white mb-3">Контактные данные</h5>
                    <p style="color: #9ca3af;">После оформления мы позвоним вам, чтобы подтвердить заказ.</p>
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Ваше имя</label>
                            <input id="customer_name" name="customer_name" value="{{ old('customer_name', auth()->user()->name) }}" required maxlength="255" class="form-control text-white @error('customer_name') is-invalid @enderror" style="background-color: #121614; border-color: #374151;">
                            @error('customer_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" required maxlength="30" autocomplete="tel" placeholder="+7 ..." class="form-control text-white @error('phone') is-invalid @enderror" style="background-color: #121614; border-color: #374151;">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Адрес доставки <span style="color: #9ca3af;">(необязательно)</span></label>
                            <input id="address" name="address" value="{{ old('address') }}" maxlength="255" class="form-control text-white @error('address') is-invalid @enderror" style="background-color: #121614; border-color: #374151;">
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="form-label">Комментарий к заказу <span style="color: #9ca3af;">(необязательно)</span></label>
                            <textarea id="comment" name="comment" rows="3" maxlength="1000" class="form-control text-white @error('comment') is-invalid @enderror" style="background-color: #121614; border-color: #374151;">{{ old('comment') }}</textarea>
                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn text-white" style="background-color: #2e7d32;">Подтвердить заказ</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body">
                    <h5 class="text-white mb-3">Ваш заказ</h5>
                    @foreach ($items as $item)
                        <div class="d-flex justify-content-between gap-3 mb-2">
                            <span>{{ $item['product']->name }} × {{ $item['quantity'] }}</span>
                            <span class="text-nowrap">{{ number_format($item['subtotal'], 2, ',', ' ') }} ₽</span>
                        </div>
                    @endforeach
                    <hr style="border-color: #374151;">
                    <div class="d-flex justify-content-between fw-bold text-white">
                        <span>Итого:</span>
                        <span style="color: #4ade80;">{{ number_format($total, 2, ',', ' ') }} ₽</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
