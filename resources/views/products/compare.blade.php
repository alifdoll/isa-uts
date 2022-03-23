@extends('layouts.index')
<!--  -->
@section('ajax')
<script>
    function showProduct1(product) {
        var emt = document.getElementById(product)
        var id = emt.value

        $.ajax({
            type: 'POST',
            url: "{{ route('product.compare') }}",
            data: {
                _token: "<?= csrf_token() ?>",
                id: id,


            },
            success: function(data) {

                $('#cpu1').html(data.msg['cpu']);
                $('#ram1').html(data.msg['ram']);
                $('#storage1').html(data.msg['storage']);
                $('#graphics1').html(data.msg['graphics']);
                $('#display1').html(data.msg['display']);
                $('#battery1').html(data.msg['battery_capacity']);
                $('#color1').html(data.msg['color']);
                $('#dimension1').html(data.msg['dimensions']);
                $('#weight1').html(data.msg['weight']);
                $('#port1').html(data.msg['ports']);
                $('#connectivity1').html(data.msg['connectivity']);
                $('#name1').html(data.msg['name']);
                $('#price1').html(data.msg['price']);
                document.getElementById("image1").src=data.msg['image'];
                // document.getElementById("image2").src=data.msg['image'];
                console.log(data.msg);
            },
        });
        // console.log(id);
    }
    function showProduct2(product) {
        var emt = document.getElementById(product)
        var id = emt.value

        $.ajax({
            type: 'POST',
            url: '{{ route('product.compare') }}',
            data: {
                _token: "<?= csrf_token() ?>",
                id: id,


            },
            success: function(data) {

                $('#cpu2').html(data.msg['cpu']);
                $('#ram2').html(data.msg['ram']);
                $('#storage2').html(data.msg['storage']);
                $('#graphics2').html(data.msg['graphics']);
                $('#display2').html(data.msg['display']);
                $('#battery2').html(data.msg['battery_capacity']);
                $('#color2').html(data.msg['color']);
                $('#dimension2').html(data.msg['dimensions']);
                $('#weight2').html(data.msg['weight']);
                $('#port2').html(data.msg['ports']);
                $('#connectivity2').html(data.msg['connectivity']);
                $('#name2').html(data.msg['name']);
                $('#price2').html(data.msg['price']);
                document.getElementById("image2").src=data.msg['image'];
                // document.getElementById("image2").src=data.msg['image'];
                console.log(data.msg);
            },
        });
        // console.log(id);
    }

    function testing() {
        console.log('tes');
    }
</script>

@endsection @section('content')

<div class="mt-5 mb-5 text-center">
    <h1>Compare Device</h1>
</div>

<section class="item-compare" id="item-compare">
    <div class="container">
        <div class="choose-compare mt-3 mb-3">
            <div class="row text-center justify-content-around">
                <div class="col-sm-4">
                    <div class="choose-item">
                        <select
                            id="1"
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option>Open this select menu</option>
                            @foreach ($product1 as $p1)
                            <option value="{{ $p1->id }}">
                                {{ $p1->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="mt-3 mb-5">
                            <button
                                type="button"
                                class="btn btn-outline-primary btn-lg"
                                style="width: 100%"
                                onclick="showProduct1('1')"
                            >
                                Select
                            </button>
                        </div>

                        <img src="" alt="" class="img-fluid" id="image1" />
                        <div class="choose-caption mt-3 mb-3">
                            <h3 id="name1"></h3>
                            <h4 id="price1"></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="choose-item">
                        <select
                            id="2"
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option>Open this select menu</option>
                            @foreach ($product2 as $p2)
                            <option value="{{ $p2->id }}">
                                {{ $p2->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="mt-3 mb-5">
                            <button
                                type="button"
                                class="btn btn-outline-primary btn-lg"
                                style="width: 100%"
                                onclick="showProduct2('2')"
                            >
                                Select
                            </button>
                        </div>
                        <img src="" alt="" class="img-fluid" id="image2" />
                        <div class="choose-caption mt-3 mb-3">
                            <h3 id="name2"></h3>
                            <h4 id="price2"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="result-compare mt-5 mb-3">
            <div class="row text-center justify-content-center">
                <div class="col-sm-8">
                    <h1 class="mb-3" id="tes">SPECIFICATION</h1>
                    <div class="row justify-content-around text-center">
                        <div class="col-sm-5">
                            <div class="table-compare">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">CPU</th>
                                            <th scope="col" id="cpu1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">RAM</th>
                                            <th scope="col" id="ram1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Storage</th>
                                            <th scope="col" id="storage1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Graphics</th>
                                            <th scope="col" id="graphics1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Display</th>
                                            <th scope="col" id="display1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Battery</th>
                                            <th scope="col" id="battery1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Color</th>
                                            <th scope="col" id="color1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Dimensions</th>
                                            <th
                                                scope="col"
                                                id="dimension1"
                                            ></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Weights</th>
                                            <th scope="col" id="weight1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ports</th>
                                            <th scope="col" id="port1"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Connectivity</th>
                                            <th
                                                scope="col"
                                                id="connectivity1"
                                            ></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="table-compare">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">CPU</th>
                                            <th scope="col" id="cpu2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">RAM</th>
                                            <th scope="col" id="ram2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Storage</th>
                                            <th scope="col" id="storage2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Graphics</th>
                                            <th scope="col" id="graphics2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Display</th>
                                            <th scope="col" id="display2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Battery</th>
                                            <th scope="col" id="battery2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Color</th>
                                            <th scope="col" id="color2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Dimensions</th>
                                            <th
                                                scope="col"
                                                id="dimension2"
                                            ></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Weights</th>
                                            <th scope="col" id="weight2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ports</th>
                                            <th scope="col" id="port2"></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Connectivity</th>
                                            <th
                                                scope="col"
                                                id="connectivity2"
                                            ></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
