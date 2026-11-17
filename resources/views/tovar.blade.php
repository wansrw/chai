@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="card shadow-sm mx-auto" style="max-width: 720px; background-color: #1a221f; border: 1px solid #374151;">
            <div class="card-body p-4">
                <h1 class="text-white mb-3">Чайный сорт {{ $product->name }}</h1>
                <p style="color: #9ca3af;">{{ $product->description }}</p>
                <div class="fs-3 fw-bold mb-4" style="color: #4ade80;">{{ $product->price }} ₽</div>
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-auto">
                            <label for="quantity" class="form-label">Количество</label>
                            <input id="quantity" type="number" name="quantity" value="1" min="1" max="99" class="form-control text-white" style="background-color: #121614; border-color: #374151;">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn text-white" style="background-color: #2e7d32;">Добавить в корзину</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
