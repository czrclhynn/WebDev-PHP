@extends('common.main')
@section('title', 'Form')
@section('content')


<div class="container py-5" style="font-family: sans-serif; color:aliceblue">
    <form method = "POST" action = "{{route('addUser')}}">
     @csrf

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="box p-4">
            @if($errors->any())
                @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                        {{ $error }}
                        </div>
                @endforeach
                
            @endif
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="firstname">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Middle Name</label>
                    <input type="text" class="form-control" placeholder="Enter your middle name" name="middlename">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="bi bi-person-fill"></i> Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your last name" name="lastname">
                </div>
                
                <h5 class="fw-bold mb-3 text-center">Log in</h5>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-envelope-at-fill"> </i> Email</label>
                    <input type="email" class="form-control" placeholder="name@example.com" name="email">
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-submit w-100">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>

<style>
   body {
    background-image: url("{{ asset('images/bg.jpg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: -1;
}
.box {
    background: rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 15px;
    padding: 20px;
    border: 1px solid rgba(0, 150, 255, 0.8);
    box-shadow: 
        0 0 15px rgba(0, 150, 255, 0.9),
        0 0 30px rgba(0, 150, 255, 0.7),
        0 0 60px rgba(0, 150, 255, 0.5);

    color: white;
}
.box:hover {
    box-shadow: 
        0 0 15px rgba(0, 150, 255, 0.9),
        0 0 35px rgba(0, 150, 255, 0.7);
}
.form-control {
    background: rgba(255, 255, 255, 0.85);
    border-radius: 8px;
    border: none;
}
.form-control:focus {
    border-color: #00bfff;
    box-shadow: 0 0 8px rgba(0, 191, 255, 0.8);
}

.btn-submit {
    background-color: #3691dc;
    color: black;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 12px;
    width: 100%;
    display: block;
}
.btn-submit:hover {
    background-color: #53a9f0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}
</style>
@endsection