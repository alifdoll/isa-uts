@extends('layouts.admin')

@section('content')

    <section class="dashboard-item" id="dashboard-item">
        <div class="container">
            <div class="row mb-5 mt-5 justify-content-around text-center">
                @if (Auth::user()->suspend == 1)
                    <div class="alert alert-danger">
                        <h3>
                            Mohon maaf, akun ada saat ini sedang tersuspend. Harap
                            menghubungi administrator.
                        </h3>
                    </div>
                @endif

                @if (Auth::user()->suspend == 0)
                    @if (Auth::user()->roles == 'administrator')
                        <div class="col-sm-4 mb-5" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">

                                </figure>
                                <div class="block-4-text p-4">
                                    <h3 class="mb-5" style="font-weight: bold;">Management Pegawai</h3>


                                    <a href="/mgpegawai" role="button" class="btn btn-lg btn-primary"
                                        style="width: 80%;">View</a>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="col-sm-4 mb-5" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">

                            </figure>
                            <div class="block-4-text p-4">
                                <h3 class="mb-5" style="font-weight: bold;">Management Product</h3>


                                <a href="/mgproduct" role="button" class="btn btn-lg btn-primary"
                                    style="width: 80%;">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-5" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">

                            </figure>
                            <div class="block-4-text p-4">
                                <h3 class="mb-5" style="font-weight: bold;">Management Transaction</h3>


                                <a href="/mgorder" role="button" class="btn btn-lg btn-primary" style="width: 80%;">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-5" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">

                            </figure>
                            <div class="block-4-text p-4">
                                <h3 class="mb-5" style="font-weight: bold;">Management Category</h3>


                                <a href="/mgcate" role="button" class="btn btn-lg btn-primary" style="width: 80%;">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-5" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">

                            </figure>
                            <div class="block-4-text p-4">
                                <h3 class="mb-5" style="font-weight: bold;">Management Brand</h3>


                                <a href="/mgbrand" role="button" class="btn btn-lg btn-primary" style="width: 80%;">View</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>

@endsection
