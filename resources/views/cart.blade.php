@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <h1 class="text-white mb-4">Корзина</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (empty($items))
        <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
            <div class="card-body text-center py-5">
                <p class="text-white fs-5 mb-3">Корзина пока пуста</p>
                <a href="{{ route('catalog') }}" class="btn text-white" style="background-color: #2e7d32;">Перейти в каталог</a>
            </div>
        </div>
    @else
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="color: #d1d5db;">
                            <thead style="background-color: #121614; color: #9ca3af;">
                                <tr>
                                    <th class="border-0">Товар</th>
                                    <th class="text-end border-0">Цена</th>
                                    <th class="text-center border-0">Количество</th>
                                    <th class="text-end border-0">Сумма</th>
                                    <th class="border-0"></th>
                                </tr>
                            </thead>
                            <tbody style="border-top: 1px solid #374151;">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="text-white">Чайный сорт {{ $item['product']->name }}</td>
                                        <td class="text-end">{{ number_format((float) $item['product']->price, 2, ',', ' ') }} ₽</td>
                                        <td>
                                            <form method="POST" action="{{ route('cart.update', $item['product']->id) }}" class="d-flex justify-content-center gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99" aria-label="Количество" class="form-control form-control-sm text-center text-white" style="max-width: 76px; background-color: #121614; border-color: #374151;">
                                                <button type="submit" class="btn btn-sm" style="color: #4ade80; border-color: #4ade80;">Обновить</button>
                                            </form>
                                        </td>
                                        <td class="text-end fw-bold">{{ number_format($item['subtotal'], 2, ',', ' ') }} ₽</td>
                                        <td class="text-end">
                                            <form method="POST" action="{{ route('cart.remove', $item['product']->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm" aria-label="Удалить товар" style="color: #ef4444; border-color: #ef4444;">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                    <div class="card-body">
                        <h5 class="card-title text-white mb-4">Итого</h5>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4 text-white">
                            <span>К оплате:</span>
                            <span style="color: #4ade80;">{{ number_format($total, 2, ',', ' ') }} ₽</span>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-lg w-100 text-white" style="background-color: #2e7d32;">
                            Оформить заказ
                        </a>
                        @guest
                            <p class="small mt-3 mb-0" style="color: #9ca3af;">Для оформления заказа войдите или зарегистрируйтесь.</p>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
