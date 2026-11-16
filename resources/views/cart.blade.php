@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <h1 class="text-white mb-4">Корзина</h1>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0" style="color: #d1d5db;">
                        <thead style="background-color: #121614; color: #9ca3af;">
                            <tr>
                                <th class="border-0">Товар</th>
                                <th class="text-center border-0">Цена</th>
                                <th class="text-center border-0" style="width: 140px;">Кол-во</th>
                                <th class="text-center border-0">Сумма</th>
                                <th class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody style="border-top: 1px solid #374151;">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://picsum.photos/50/50?random=11" class="rounded me-3" alt="Товар">
                                        <span class="text-white">Чайный сорт №1</span>
                                    </div>
                                </td>
                                <td class="text-center">450 ₽</td>
                                <td class="text-center">
                                    <div class="input-group input-group-sm justify-content-center">
                                        <button class="btn" style="border-color: #374151; color: #9ca3af;">-</button>
                                        <input type="text" class="form-control text-center text-white" value="1" readonly style="max-width: 50px; background-color: #121614; border-color: #374151;">
                                        <button class="btn" style="border-color: #374151; color: #9ca3af;">+</button>
                                    </div>
                                </td>
                                <td class="text-center fw-bold">450 ₽</td>
                                <td class="text-end">
                                    <button class="btn btn-sm" style="color: #ef4444; border-color: #ef4444;"><i class="bi bi-trash"></i></button>
                                    <button class="btn btn-sm text-white" style="background-color: #2e7d32;">Оплатить</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card shadow-sm" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body">
                    <h5 class="card-title text-white mb-4">Итого</h5>
                    <div class="d-flex justify-content-between mb-2" style="color: #9ca3af;">
                        <span>Товаров:</span>
                        <span>1 шт.</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3" style="color: #9ca3af;">
                        <span>Сумма:</span>
                        <span>450 ₽</span>
                    </div>
                    <hr style="border-color: #374151;">
                    <div class="d-flex justify-content-between fw-bold fs-5 mb-4 text-white">
                        <span>К оплате:</span>
                        <span style="color: #4ade80;">450 ₽</span>
                    </div>
                    <button class="btn btn-lg w-100 text-white" style="background-color: #2e7d32;">
                        <i class="bi bi-credit-card"></i> Купить всё
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection