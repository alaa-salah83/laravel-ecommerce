<style>
    .div_deg_page{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
</style>
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($product_user as $products)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="img-box">
                        <img src="products/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>{{$products->title}}</h6>
                        <h6>Price
                            <span>${{$products->price}}</span>
                        </h6>
                    </div>
                    <div style="padding: 20px">
                        <a href="{{url('product_details',$products->id)}}" class="btn btn-warning">Details</a>
                        <a href="{{url('add_cart',$products->id)}}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<div class="div_deg_page">
    {{$product_user->links()}}
</div>
