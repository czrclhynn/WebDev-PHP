@extends('common.main')
@section('title', 'Pricing')
@section('content')

    <div class="background-calc" style="color: blue; font-family: sans-serif;">
        <div class="container">

            <div class="row">
                <h1>SUM: {{ $sum }}</h1>
                <h1>DIFFERENCE: {{ $difference }}</h1>
                <h1>PRODUCT: {{ $product }}</h1>
                <h1>QUOTIENT: {{ $quotient }}</h1>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
        <i class="bi bi-7-circle-fill"></i>
            <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="background-calc" style="margin-top: 10px;"> 
                        <input type="text" class="form-control" id="inputFName" placeholder="First Name">
                        <div class="g-button">
                            <button type="button" id ="" >Enter</button>
                        </div>
                    </div>

                    <div id="g-button">
                        <button type="button" id ="">Enter Again</button>
                    </div>

            </div>
            </div>

        </div>
    </div>
        <div class = "container border">
            <div class = "row">
                <div class = "col-lg-6 border">COL 6</div>
                <div class = "col-lg-6 border">COL 6</div>
                <div class = "col-lg-6 border">COL 6</div>
            </div>
        </div>

        <div class = "row">
                <div class = "col-lg-4 col-md-6 col-sm-4 border">COL 4</div>
                <div class = "col-lg-4 col-md-6 col-sm-4 border">COL 4</div>
                <div class = "col-lg-4 col-md-6 col-sm-4 border">COL 4</div>
        </div>


<style>
        .background-calc {
            background-color: pink;
            font-weight: 25px;
        }

        #inputFName {
            font-size: 30px;
        }

        div {
            border-width: 2px;
            border-color: black;
            border-style: solid;
        }

        .background-calc .g-button {
            background-color: green;
            color: black;
        }

        .container {
            padding: 0px;
            margin: 0px;
        }
</style>
@endsection
