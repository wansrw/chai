@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <!-- Карусель -->
    <div id="carouselExampleInterval" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"></button>
        </div>
        
        <div class="carousel-inner rounded-4 shadow">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="https://placehold.co/1200x400/1a221f/4ade80?text=Свежий+чай" class="d-block w-100" alt="Чай">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="https://placehold.co/1200x400/0a0f0d/4ade80?text=Чайные+церемонии" class="d-block w-100" alt="Церемонии">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="https://placehold.co/1200x400/1a221f/4ade80?text=Подарочные+наборы" class="d-block w-100" alt="Наборы">
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section class="mt-4">
        <!-- Использован синтаксис Bootstrap 6: md:col-6 -->
        <div class="row align-items-center g-4">
            <div class="col-12 md:col-6">
                <h1 class="display-5 fw-bold text-white">Чайная Лавка</h1>
                <p class="lead" style="color: #e5e7eb;">Мы собираем лучшие сорта чая со всего мира, чтобы вы могли наслаждаться каждым глотком.</p>
                <p style="color: #9ca3af;">Наш магазин — это не просто точка продаж, а место, где вы можете узнать о традициях чаепития, подобрать чай под настроение и найти идеальный подарок.</p>
                <a href="{{ route('catalog') }}" class="btn btn-lg mt-3 px-4 text-white" style="background-color: #2e7d32; border-color: #2e7d32;">Перейти в каталог</a>
            </div>
        </div>
    </section>
</div>
@endsection