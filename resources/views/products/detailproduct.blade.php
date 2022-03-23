@extends('layouts.index')

@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $p->name }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $p->image }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $p->name }}</h2>
                    <p class="mt-3 mb-4">{{ $p->description }}</p>

                    <p><strong class="text-primary h4">{{ number_format($p->price) }}</strong></p>
                    <div class="mb-1 d-flex">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th scope="col">CPU</th>
                                    <th scope="col">{{ $p->cpu }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">RAM</th>
                                    <th scope="col">{{ $p->ram }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Storage</th>
                                    <th scope="col">{{ $p->storage }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Graphics</th>
                                    <th scope="col">{{ $p->graphics }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Display</th>
                                    <th scope="col">{{ $p->display }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Battery</th>
                                    <th scope="col">{{ $p->battery_capacity }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Color</th>
                                    <th scope="col">{{ $p->color }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Dimensions</th>
                                    <th scope="col">{{ $p->dimensions }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Weight</th>
                                    <th scope="col">{{ $p->weight }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Ports</th>
                                    <th scope="col">{{ $p->ports }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Connectivity</th>
                                    <th scope="col">{{ $p->connectivity }}</th>
                                </tr>

                            </thead>
                        </table>

                    </div>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="">
                            <form action="{{ url('add-to-cart/' . $p->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="image" value="{{ $p->image }}">
                                <input type="hidden" name="name" value="{{ $p->name }}">
                                <input type="hidden" name="price" value="{{ $p->price }}">
                                <div class="row">
                                    <div class="col-sm-3">
                                        
                                            <button class="btn btn-outline-primary js-btn-minus"  type="button"style="width: 100%;" >&minus;</button>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="quantity" type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon"  
                                        style="width: 100%;" aria-describedby="button-addon1">
                                    </div>
                                    <div class="col-sm-3">
                                        
                                            <button class="btn btn-outline-primary js-btn-plus" type="button" style="width: 100%;">&plus;</button>
                                    </div>
                                </div>
                                
                                
                                
                                <button class="btn btn-primary btn-lg mt-5" style="width: 80%;" type="submit">add to cart</button>
                            </form>
                        </div>

                    </div>
                    {{-- <p>
                        <a href="{{ url('add-to-cart/' . $p->id) }}" class="buy-now btn btn-sm btn-primary">Add To Cart</a>
                    </p> --}}

                </div>
            </div>
        </div>
    </div>

@endsection
