@extends('layouts.app')

@section('content')
<style>
    .text-orange { color: #f48c25 !important; }
    .btn-orange { background-color: #f48c25 !important; color: white !important; border: none; }
    .filter-badge { border: 1px solid #eee; border-radius: 20px; padding: 8px 16px; font-weight: 500; font-size: 14px; background: white; color: #555; }
    .category-item img { width: 75px; height: 75px; border-radius: 50%; object-fit: cover; margin-bottom: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .card-restaurant { border: none; border-radius: 20px; transition: transform 0.2s; }
    .card-restaurant:hover { transform: translateY(-5px); }
    .card-restaurant img { border-radius: 20px; height: 180px; object-fit: cover; }
    .status-badge { position: absolute; top: 12px; left: 12px; font-size: 10px; font-weight: bold; padding: 4px 8px; border-radius: 8px; text-transform: uppercase; }
</style>

<div class="container py-4">
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0">What's on your mind?</h4>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm rounded-circle border shadow-sm">←</button>
                <button class="btn btn-light btn-sm rounded-circle border shadow-sm">→</button>
            </div>
        </div>
        <div class="d-flex gap-4 overflow-auto pb-2 no-scrollbar text-center">
            @php
                $categories = [
                    ['name' => 'Pizza', 'img' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=200'],
                    ['name' => 'Sushi', 'img' => 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=200'],
                    ['name' => 'Burgers', 'img' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=200'],
                    ['name' => 'Chicken', 'img' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=200'],
                    ['name' => 'Ramen', 'img' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=200'],
                    ['name' => 'Salads', 'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200'],
                    ['name' => 'Tacos', 'img' => 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=200']
                ];
            @endphp
            @foreach($categories as $cat)
            <div class="category-item">
                <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }}">
                <p class="small fw-bold">{{ $cat['name'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
        <button class="btn btn-orange rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2">
            Filters <span class="small">☰</span>
        </button>
        <div class="filter-badge">Free Delivery ✕</div>
        <div class="filter-badge">4.5+ Rating ✕</div>
        <div class="filter-badge">Under 30 mins ✕</div>
        <div class="filter-badge">Price: $$ ✕</div>
        <button class="btn btn-link text-orange fw-bold text-decoration-none small ms-2">Clear All</button>
    </div>

    <div class="text-start">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h4 class="fw-bold m-0">Restaurants in New York</h4>
            <div class="small fw-bold text-muted">Sort by: <span class="text-dark">Recommended ▾</span></div>
        </div>

        <div class="row g-4">
            @for($i = 0; $i < 8; $i++)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-restaurant shadow-sm position-relative h-100">
                    <span class="status-badge bg-white text-orange shadow-sm">Free Delivery</span>
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400" class="card-img-top">
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-1">The Burger Joint</h6>
                        <p class="text-muted small mb-2">American • Burgers • $$</p>
                        <div class="d-flex justify-content-between align-items-center pt-1">
                            <span class="fw-bold small">⭐ 4.8</span>
                            <span class="text-muted small">25-35 mins</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div class="text-center mt-5 py-4">
        <p class="text-muted small fw-bold mb-2">Showing 8 of 142 restaurants</p>
        <div class="progress mx-auto mb-4" style="height: 4px; width: 200px; background-color: #eee;">
            <div class="progress-bar bg-orange" style="width: 25%"></div>
        </div>
        <button class="btn btn-orange px-5 py-3 fw-bold rounded-pill shadow">
            Load More Restaurants
        </button>
    </div>
</div>

<div class="fixed-bottom text-center mb-4">
    <button class="btn btn-dark rounded-pill px-4 py-3 shadow-lg d-inline-flex align-items-center gap-2 fw-bold">
        <span>🗺️</span> Map View
    </button>
</div>
@endsection
