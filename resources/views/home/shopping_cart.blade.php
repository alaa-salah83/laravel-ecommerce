<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    @include('home.css')
    <style>
        .div_t_design{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            text-align: center;
            margin: 20px auto;
            border: none;
            color: white;
            font-size: 20px;
            width:100%;
        }
        th{
            background-color: #db4566;
            padding: 15px;
        }

        td{
            padding: 10px;
            text-align: center;
            color: black;
        }
        .cart_total{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            font-size: larger;
            font-weight: bolder;
        }
        .order-deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div_gap{
            padding: 10px;
        }

        .link-card{
            margin-left: 30px;
            padding: 10px;
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
<div class="div_t_design">
<table>
    <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
    </tr>

    <?php
    $total = 0;
    ?>

    @foreach($cart as $carts)
    <tr>
        <td>{{$carts->product->title}}</td>
        <td>${{$carts->product->price}}</td>
        <td>
            <img src="/products/{{$carts->product->image}}" style="width:150px;height: 150px">
        </td>
        <td>
            <a href="{{url('delete_cart',$carts->id)}}" class="btn btn-danger" onclick="confirmation(event)">Remove</a>
        </td>
    </tr>

    <?php
        $total = $total + $carts->product->price;
        ?>
    @endforeach
</table>
</div>

<div class="cart_total">
    Total price is:&nbsp;&nbsp; <span style="color:darkred">${{$total}}</span>
</div>

<div class="order-deg">
    <form action="{{url('confirm_order')}}" method="post">
        @csrf
        <div class="div_gap">
            <label>Receiver Name</label>
            <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>

        <div class="div_gap">
            <label>Receiver Address</label>
            <textarea name="address">{{Auth::user()->address}}</textarea>
        </div>

        <div class="div_gap">
            <label>Receiver Phone</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>

        <div class="div_gap">
            <div class="link-card">
                <input type="submit" value="Cash on Delivery" class="btn btn-primary">
                <a href="{{url('stripe',$total)}}" class="btn btn-dark">Pay by Card</a>
            </div>
        </div>
    </form>
</div>



<!-- info section -->
@include('home.footer')

<!-- JavaScript files-->
<script>
    function confirmation(event){
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        swal({
            title: "Are You Sure Delete Order?",
            text: "Once deleted, you will not be able to recover this order!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                } else {
                    swal("Your Order is safe!");
                }
            });
    }
</script>
@include('admin.js')
</body>
</html>


