@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-white">Каталог чая</h1>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#filterModal" style="color: #4ade80; border-color: #4ade80;">
            <i class="bi bi-funnel"></i> Фильтры
        </button>
    </div>

    <div class="row g-4">
        @foreach($products as $i)

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                <img src="{{ asset($i->img) }}" class="card-img-top" style="object-fit: cover; height: 200px;" alt="Товар">
                <div class="card-body">
                    <h5 class="card-title text-white">Чайный сорт {{ $i->name }}</h5>
                    <p class="card-text mb-2" style="color: #9ca3af;">{{$i->description}}</p>
                    <h4 class="fw-bold" style="color: #4ade80;">{{$i->price}} Р</h4>
                </div>
                <div class="card-footer pb-3" style="background-color: transparent; border-top: none;">
                    <a href="{{ route('tovar',['id' => $i->id]) }}" class="btn w-100 mb-2" style="color: #4ade80; border-color: #4ade80;">Подробнее</a>
                    <form method="POST" action="{{ route('cart.add', $i->id) }}">
                        @csrf
                        <button type="submit" class="btn w-100 text-white" style="background-color: #2e7d32;">В корзину</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Модальное окно -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #1a221f; border: 1px solid #374151;">
            <div class="modal-header" style="border-bottom: 1px solid #374151;">
                <h5 class="modal-title text-white">Фильтры</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('catalog') }}">
    <label class="form-label">Категория</label>

        <select name="category" class="form-select">
            <option value="">Все категории</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

    <label class="form-label mt-3">Цена</label>

    <input type="number" name="price_from"placeholder="От" value="{{ request('price_from') }}" class="form-control">

    <input type="number"name="price_to" placeholder="До"value="{{ request('price_to') }}"class="form-control mt-2">

    <button type="submit" class="btn btn-success mt-3">
        Применить
    </button>
</form>
@endsection
