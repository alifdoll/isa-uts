@extends('layouts.index')

@section('content')

<div class="row mb-5 mt-5">
@foreach ($product as $item)
<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
    <div class="block-4 text-center border">
      <figure class="block-4-image">
        <a href="/product/{{ $item->id }}"><img src="{{ $item->image }}" alt="Image placeholder" style="width: 400px; height: 300px;"></a>
      </figure>
      <div class="block-4-text p-4">
        <h3><a href="/productsdetail">{{ $item->name }}</a></h3>
        <p class="mb-0" style="overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        ">{{ $item->description }}</p>
        @php
            $priceX = number_format($item->price);
            $split = str_split($priceX);
            // echo $split[0];
            // echo $split[1];
            $length = Str::length($priceX);
            for ($i=0; $i < $length; $i++) { 
              // echo $split[3];
              if($length == 10)
              {
                if($i>0)
                // echo "Tes";   
                $replaced = str_replace($split[1], "X", $priceX);
              }
              else 
              {
                if($split[2]=="1" || $split[2]=="2" ||$split[2]=="2"||$split[2]=="4"||$split[2]=="5"||$split[2]=="6"||$split[2]=="7"||$split[2]=="8"||$split[2]=="9")
                {

                  $replaced = str_replace($split[$i], "Z", $priceX);
                  // if($split[0] == $split[3])
                  // {
                  //   //  $split[2]=="Z";
                  //   $replaced = str_replace($split[$i], "Z", $priceX);
                  // }
                  
                // echo "Tes";   
                
                }
                else 
                {
                  if($i>0)
                // echo "Tes";   
                $replaced = str_replace($split[2], "X", $priceX);
                }
                
              }
            }
            // echo $replaced;
        @endphp
        <p class="text-primary font-weight-bold">{{ $replaced }}</p>
      </div>
    </div>
  </div>

@endforeach
</div>
    
    
@endsection


