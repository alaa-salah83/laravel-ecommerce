<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    @include('home.css')

    <style>
        .div_deg_img{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box{
            padding: 15px;
        }
    </style>
</head>

<body>
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
</div>
<!-- end hero area -->

{{--product details start--}}
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                {{$details_data->title}}
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="div_deg_img">
                        <img src="/products/{{$details_data->image}}" alt="" style="width:500px; height:500px;">
                    </div>
                    <div class="detail-box">
                        <h6>{{$details_data->title}}</h6>
                        <h6>Price
                            <span>${{$details_data->price}}</span>
                        </h6>
                    </div>

                    <div class="detail-box">
                        <h6>Category:{{$details_data->category}}</h6>
                        <h6>Available Quantity:
                            <span>{{$details_data->quantity}}</span>
                        </h6>
                    </div>

                    <div class="detail-box">
                        <p>{{$details_data->description}}</p>
                    </div>

                    <div class="detail-box">
                        <a href="{{url('add_cart',$details_data->id)}}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{--product details end--}}

<!-- info section -->
@include('home.footer')

</body>
</html>

