@extends('common.main')
@section('title', 'Pricing')
@section('content')

<div style="font-family: sans-serif; color:aliceblue" class="container mt-4">
    <div class="row">

        
        <div class="col-lg-4 col-md-12 mb-3">
    <div class="box p-3">
        <h3 class="text-center">Log in</h3>

        <label class="d-flex align-items-center gap-1 mb-1">
            <i class="bi bi-envelope-fill"></i> Email:
        </label>
        <input type="email" class="form-control mb-3">

        <label class="d-flex align-items-center gap-1 mb-1">
            <i class="bi bi-lock-fill"></i> Password:
        </label>
        <input type="password" class="form-control mb-3">

        <button class="btn btn-primary">Login</button>
        <a href="#" class="ms-2" style="color: #66ccff;">Forgot password?</a>
    </div>
</div>
        
        <div class="col-lg-8 col-md-12">

            <h2 class="text-center">Pricing</h2>
            <p class="text-center">
                Choose your favorite skins and upgrade your hero’s power.
            </p>

            <!-- IMAGE GRID -->
            <div class="row">

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero1.jpg') }}" class="product-img">
            <div class="product-info">
                <h6>Night Shade</h6>
                <small>Ling</small>
                <p class="price">₱1,999.00</p>
            </div>
        </div>
    </div>

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero2.jpg') }}" class="product-img">
            <div class="product-info">
                <h6>Dreambound Pixie</h6>
                <small>Mathilda</small>
                <p class="price">₱1,459.00</p>
            </div>
        </div>
    </div>

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero3.jpg') }}" class="product-img">
            <div class="product-info">
                <h6>Volcanic Overlord</h6>
                <small>Khufra</small>
                <p class="price">₱999.00</p>
            </div>
        </div>
    </div>

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero4.jpg') }}" class="product-img">
            <div class="product-info">
                <h6>Mecha Infernus</h6>
                <small>Atlas</small>
                <p class="price">₱1,299.00</p>
            </div>
        </div>
    </div>

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero5.jpg') }}" class="product-img">
            <div class="product-info">
                <h6>Eren (AOT)</h6>
                <small>Yin</small>
                <p class="price">₱1,999.00</p>
            </div>
        </div>
    </div>

    
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <img src="{{ asset('images/hero6.png') }}" class="product-img">
            <div class="product-info">
                <h6>Pixel Blast</h6>
                <small>WanWan</small>
                <p class="price">₱1,999.00</p>
            </div>
        </div>
    </div>

</div>

            <h5 class="mt-4">Compare Plans</h5>

        <div class="table-container mt-4">
    <table class="custom-table text-center">
        <thead>
            <tr>
                <th></th>
                <th>Free</th>
                <th>Pro</th>
                <th>Enterprise</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Public</td>
                <td class="check">✔</td>
                <td class="check">✔</td>
                <td class="check">✔</td>
            </tr>
            <tr>
                <td>Private</td>
                <td></td>
                <td class="check">✔</td>
                <td class="check">✔</td>
            </tr>
            <tr>
                <td>Permissions</td>
                <td></td>
                <td class="check">✔</td>
                <td class="check">✔</td>
            </tr>
        </tbody>
    </table>
</div>

        </div>
    </div>
</div>



<style>
    body {
    background-image: url("{{ asset('images/bg.jpg') }}");
    background-size: cover;       
    background-position: center;  
    background-repeat: no-repeat;
    background-attachment: fixed; 
    
    }
    .box, .product-card {
    background: rgba(0, 0, 0, 0.2); 
    backdrop-filter: blur(5 px);   
    -webkit-backdrop-filter: blur(5 px);
    border-radius: 15px;
    padding: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2); 
    color: white;
    }
    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: -1;
    }
    h5 {
    text-align: center;
    margin-bottom: 15px;
    }
    
    .box, .product-card {
        box-shadow: 
        0 0 10px rgba(0, 150, 255, 0.5),   
        0 0 20px rgba(0, 150, 255, 0.3);
        backdrop-filter: blur(10px);
    }
    .product-card:hover {
    transform: scale(1.05);
    transition: 0.3s;

    box-shadow: 
        0 0 15px rgba(0, 150, 255, 0.8),
        0 0 30px rgba(0, 150, 255, 0.6);
    }

    .placeholder-box {
        width: 100%;
        height: 120px;
        border: 1px solid black;
    }
   .product-card {
    border-radius: 15px;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.2); 
    color: white;
    text-align: center;
    padding: 10px;
    }

    .product-img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
    }

    .product-info {
    margin-top: 10px;
    }

    .price {
    font-weight: bold;
    }
    .table-container {
    display: flex;
    justify-content: center;
    }

    .custom-table {
        width: 80%;
        border-radius: 15px;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.5) !important;
        backdrop-filter: blur(10px);
        color: white;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        padding: 12px;
    }

    .custom-table thead {
        background: rgba(98, 174, 229, 0.3) !important;
    }

    .custom-table tbody tr:hover {
        background: rgba(0, 150, 255, 0.15);
    }

    .check {
        color: #edf2f4;
        font-weight: bold;
    }
</style>
@endsection

