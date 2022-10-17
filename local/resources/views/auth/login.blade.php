@extends('frontEnd.layout.main')
@section('content')


<section data-bs-version="5.1" class="form3 cid-tk1w8o3j1H" id="form3-1l">

    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- <div class="col-lg-7 col-12">
                <div class="image-wrapper">
                    <img class="w-100" src="local/public/assets/images/297522360-440525688088059-5095552785632348136-n-960x432.jpg" alt="">
                </div>
            </div> --}}
            <div class="col-lg-3 offset-lg-1 mbr-form" data-form-type="formoid">
                <br><br><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Success fully login</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            Oops...! some problem!
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="mbr-section-title mb-4 display-2">
                                <strong>Login</strong></h1>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            
                        </div>
                        <div data-for="email" class="col-lg-12 col-md col-sm-12 form-group mb-3">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" id="email">
                        </div>
                        <div class="col-lg-12 col-md col-sm-12 form-group mb-3" data-for="email">
                            <input type="password" name="password" placeholder="Password" data-form-field="password" class="form-control" value="" id="password-form3-1l">
                        </div>
                        <div class="col-md-auto col-12 mbr-section-btn"><button type="submit" class="btn btn-black display-4">Login</button></div>
                    </div>
                </form>
                <br><br><br><br><br><br>
            </div>
            
            <div class="offset-lg-1"></div>
        </div>
    </div>
</section>

@endsection
