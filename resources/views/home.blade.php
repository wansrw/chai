@extends('layouts.app')

@section('content')
<div class="container pt-4 pb-5">
    <h1 class="text-white mb-4">Личный кабинет</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card shadow-sm mb-4" style="background-color: #1a221f; border: 1px solid #374151;">
        <div class="card-body">
            <h5 class="text-white mb-3">Данные пользователя</h5>
            <p class="mb-1">Имя: <span class="text-white">{{ auth()->user()->name }}</span></p>
            <p class="mb-0">Email: <span class="text-white">{{ auth()->user()->email }}</span></p>
        </div>
    </div>

    <h2 class="text-white h3 mb-3">Мои заказы</h2>
    @forelse ($orders as $order)
        <div class="card shadow-sm mb-3" style="background-color: #1a221f; border: 1px solid #374151;">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between gap-2 mb-3">
                    <div>
                        <h5 class="text-white mb-1">Заказ №{{ $order->id }}</h5>
                        <span class="small" style="color: #9ca3af;">{{ $order->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                    <span class="badge align-self-start" style="background-color: #2e7d32;">
                        {{ ['new' => 'Новый', 'processing' => 'В обработке', 'completed' => 'Выполнен', 'cancelled' => 'Отменён'][$order->status] ?? $order->status }}
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm mb-3" style="color: #d1d5db;">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th class="text-center">Количество</th>
                                <th class="text-end">Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">{{ number_format($item->unit_price * $item->quantity, 2, ',', ' ') }} ₽</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-wrap justify-content-between gap-2">
                    <span style="color: #9ca3af;">Телефон для связи: {{ $order->phone }}</span>
                    <span class="text-white fw-bold">Итого: <span style="color: #4ade80;">{{ number_format($order->total, 2, ',', ' ') }} ₽</span></span>
                </div>
                @if ($order->address)
                    <p class="small mt-2 mb-0" style="color: #9ca3af;">Адрес: {{ $order->address }}</p>
                @endif
                @if ($order->comment)
                    <p class="small mt-2 mb-0" style="color: #9ca3af;">Комментарий: {{ $order->comment }}</p>
                @endif
            </div>
        </div>
    @empty
        <div class="card" style="background-color: #1a221f; border: 1px solid #374151;">
            <div class="card-body text-center py-5">
                <p class="text-white mb-3">Вы ещё не оформляли заказы.</p>
                <a href="{{ route('catalog') }}" class="btn text-white" style="background-color: #2e7d32;">Перейти в каталог</a>
            </div>
        </div>
    @endforelse
</div>
@endsection
