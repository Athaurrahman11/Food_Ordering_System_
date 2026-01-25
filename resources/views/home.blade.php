@extends('layouts.app')

@section('content')
<section class="container mt-4 px-md-5">
    <div class="hero-banner rounded-3xl d-flex align-items-center justify-content-center text-center text-white p-4 p-md-5 shadow-lg position-relative">
        <div style="max-width: 800px;">
            <span class="badge bg-brand rounded-pill mb-4 px-3 py-2 fw-bold uppercase">NEW IN TOWN</span>
            <h1 class="display-2 fw-bolder mb-3">The best of your city, <br><span class="text-brand">delivered.</span></h1>
            <p class="fs-5 mb-5 opacity-90 mx-auto px-md-5">Experience culinary excellence from local icons to underground gems, right at your doorstep.</p>

            <div class="glass-search p-2 rounded-pill shadow-lg d-flex flex-column flex-md-row gap-2 mx-auto" style="max-width: 650px;">
                <div class="flex-grow-1 d-flex align-items-center px-4 bg-white rounded-pill">
                    <span class="material-symbols-outlined text-brand me-3">location_on</span>
                    <input type="text" class="form-control border-0 shadow-none fw-semibold py-3" placeholder="What are you craving?">
                </div>
                <button class="btn btn-brand px-5 py-3 rounded-pill d-flex align-items-center justify-content-center gap-2">
                    <span class="material-symbols-outlined">search</span> Find Food
                </button>
            </div>
        </div>
    </div>
</section>

<section class="container mt-n4 position-relative px-md-5" style="z-index: 10;">
    <div class="bg-white rounded-4 shadow-sm border p-3 mt-5">
        <div class="d-flex gap-2 gap-md-3 flex-nowrap align-items-center overflow-auto pb-1 hide-scrollbar">
            <button class="btn btn-brand rounded-pill px-4 py-2 text-nowrap d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-5">restaurant</span> All Cuisines
            </button>
            <button class="btn btn-light-custom rounded-pill px-4 py-2 text-nowrap border d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-5">local_pizza</span> Neapolitan Pizza
            </button>
            <button class="btn btn-light-custom rounded-pill px-4 py-2 text-nowrap border d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-5">set_meal</span> Premium Sushi
            </button>
            <button class="btn btn-light-custom rounded-pill px-4 py-2 text-nowrap border d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-5">lunch_dining</span> Craft Burgers
            </button>
            <button class="btn btn-light-custom rounded-pill px-4 py-2 text-nowrap border d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-5">eco</span> Vegan Bowls
            </button>
        </div>
    </div>
</section>

<section class="py-5 mt-5" style="background-color: #fbf6f1;">
    <div class="container px-md-5 py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bolder display-5 mb-2">How it Works</h2>
            <p class="text-muted fw-medium fs-5">Getting your favorite food is easier than ever.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="bg-brand-light mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                        <span class="material-symbols-outlined text-brand fs-1">touch_app</span>
                    </div>
                    <h4 class="fw-bold mb-3">Pick your plate</h4>
                    <p class="text-muted small px-lg-4">Browse thousands of menus from top-rated restaurants in your neighborhood.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="bg-brand-light mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                        <span class="material-symbols-outlined text-brand fs-1">account_balance_wallet</span>
                    </div>
                    <h4 class="fw-bold mb-3">Secure checkout</h4>
                    <p class="text-muted small px-lg-4">Pay safely with Apple Pay, credit cards, or your preferred local payment method.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="bg-brand-light mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                        <span class="material-symbols-outlined text-brand fs-1">celebration</span>
                    </div>
                    <h4 class="fw-bold mb-3">Savor the moment</h4>
                    <p class="text-muted small px-lg-4">Relax as your hot meal travels from the kitchen to your door in minutes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 px-md-5 mt-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bolder mb-1">Trending Near You</h2>
            <p class="text-muted mb-0">Top picks from food critics and locals alike.</p>
        </div>
        <a href="#" class="text-brand fw-bold text-decoration-none d-flex align-items-center gap-1">
            View all restaurants <span class="material-symbols-outlined fs-5">arrow_forward</span>
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7 col-md-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=800" class="card-img-top" style="height: 380px; object-fit: cover;">
                    <span class="badge bg-white text-dark position-absolute top-0 end-0 m-3 rounded-pill shadow-sm d-flex align-items-center gap-1 py-2 px-3 fw-bold">
                        <span class="material-symbols-outlined text-warning fs-6" style="font-variation-settings: 'FILL' 1">star</span> 4.9
                    </span>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="fw-bold mb-0">Mizu Premium Sushi</h3>
                        <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2 fw-bold">Free Delivery</span>
                    </div>
                    <p class="text-muted mb-4 fs-5">Japanese • Seafood • Fine Dining</p>
                    <div class="d-flex align-items-center gap-4 text-muted">
                        <span class="d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-5">schedule</span> 20-30 min</span>
                        <span class="fw-bold text-dark">$$$</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12">
            <div class="row g-4">
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500" class="card-img-top" style="height: 160px; object-fit: cover;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm d-flex align-items-center gap-1 p-1 small fw-bold">
                                <span class="material-symbols-outlined text-warning fs-6" style="font-variation-settings: 'FILL' 1">star</span> 4.7
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">The Burger Lab</h6>
                            <p class="text-muted small mb-2 x-small">American • Burgers</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted x-small d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-6">schedule</span> 15 min</span>
                                <a href="#" class="text-brand fw-bold x-small text-decoration-none">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=500" class="card-img-top" style="height: 160px; object-fit: cover;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm d-flex align-items-center gap-1 p-1 small fw-bold">
                                <span class="material-symbols-outlined text-warning fs-6" style="font-variation-settings: 'FILL' 1">star</span> 4.8
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">Pizzeria Napoli</h6>
                            <p class="text-muted small mb-2 x-small">Italian • Pizza</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted x-small d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-6">schedule</span> 25 min</span>
                                <a href="#" class="text-brand fw-bold x-small text-decoration-none">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500" class="card-img-top" style="height: 160px; object-fit: cover;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm d-flex align-items-center gap-1 p-1 small fw-bold">
                                <span class="material-symbols-outlined text-warning fs-6" style="font-variation-settings: 'FILL' 1">star</span> 4.6
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">Green Leaf Kitchen</h6>
                            <p class="text-muted small mb-2 x-small">Vegan • Healthy</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted x-small d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-6">schedule</span> 10 min</span>
                                <a href="#" class="text-brand fw-bold x-small text-decoration-none">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500" class="card-img-top" style="height: 160px; object-fit: cover;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm d-flex align-items-center gap-1 p-1 small fw-bold">
                                <span class="material-symbols-outlined text-warning fs-6" style="font-variation-settings: 'FILL' 1">star</span> 4.9
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold mb-1">Sugar High Artisans</h6>
                            <p class="text-muted small mb-2 x-small">Bakery • Sweets</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted x-small d-flex align-items-center gap-1"><span class="material-symbols-outlined fs-6">schedule</span> 20 min</span>
                                <a href="#" class="text-brand fw-bold x-small text-decoration-none">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
