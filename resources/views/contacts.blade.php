@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <h1 class="text-white mb-4">Контакты</h1>
    
    <div class="row g-4">
        <div class="col-12 col-md-5">
            <div class="card shadow-sm h-100" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body">
                    <h5 class="card-title text-white mb-4">Наши реквизиты</h5>
                    
                    <div class="mb-3 d-flex">
                        <i class="bi bi-geo-alt-fill fs-5 me-3" style="color: #4ade80;"></i>
                        <div>
                            <strong class="text-white d-block">Адрес:</strong>
                            <span style="color: #9ca3af;">г. Москва, ул. Чайная, д. 1</span>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex">
                        <i class="bi bi-telephone-fill fs-5 me-3" style="color: #4ade80;"></i>
                        <div>
                            <strong class="text-white d-block">Телефон:</strong>
                            <a href="tel:+79990000000" class="text-decoration-none" style="color: #9ca3af;">+7 (999) 000-00-00</a>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex">
                        <i class="bi bi-envelope-fill fs-5 me-3" style="color: #4ade80;"></i>
                        <div>
                            <strong class="text-white d-block">Email:</strong>
                            <a href="mailto:info@tea-shop.ru" class="text-decoration-none" style="color: #9ca3af;">info@tea-shop.ru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-7">
            <div class="card shadow-sm h-100" style="background-color: #1a221f; border: 1px solid #374151;">
                <div class="card-body">
                    <h5 class="card-title text-white mb-4">Напишите нам</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" style="color: #9ca3af;">Ваше имя</label>
                            <input type="text" class="form-control" placeholder="Иван Иванов" style="background-color: #121614; color: #fff; border-color: #374151;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="color: #9ca3af;">Email</label>
                            <input type="email" class="form-control" placeholder="you@example.com" style="background-color: #121614; color: #fff; border-color: #374151;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="color: #9ca3af;">Сообщение</label>
                            <textarea class="form-control" rows="4" placeholder="Ваш вопрос..." style="background-color: #121614; color: #fff; border-color: #374151;"></textarea>
                        </div>
                        <button type="button" class="btn text-white px-4" style="background-color: #2e7d32;">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection