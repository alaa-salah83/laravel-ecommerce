<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Bootstrap Admin </title>
    <style>
        .div_deg_t{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .t-deg-pdf{
            text-align: center;
            margin: 20px auto;
            border: 3px solid #bd2130;
            font-size: 24px;
            width:100%;
        }
        th{
            background-color: #fce8cf;
            border: 1px solid #bd2130;
            padding: 10px;
        }

        td{
            padding: 10px;
            border: 1px solid #bd2130;
        }
        img{
            width: 300px;
            height: 300px;
        }
        .admin_deg{
            position: absolute;
            right: 0;
            bottom:25px;
            font-size: larger;
            font-style: italic;
            font-family: "Book Antiqua";
        }
        .time_date_deg{
            position: absolute;
            right: 8px;
            bottom:0;
            font-size: larger;
            font-style: italic;
            font-family: "Book Antiqua";
        }
    </style>
</head>
<body>
<h1 style="background-color:#DB6574;">Order Data</h1>
<div class="div_deg_t">
<table class="t-deg-pdf">
    <tr>
        <th>Customer Name</th>
        <td>{{$data->name}}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{$data->rec_address}}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{$data->phone}}</td>
    </tr>
    <tr>
        <th>Product Title</th>
        <td>{{$data->product->title}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>${{$data->product->price}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{$data->status}}</td>
    </tr>
    <tr>
    <th>Image</th>
        <td>
            <img src="products/{{$data->product->image}}">
        </td>
    </tr>
</table>
</div>
<div class="admin_deg">Preparation by:&nbsp;&nbsp;{{auth()->user()->name}}</div>
<div class="time_date_deg">
    <?php
    $mytime = Carbon\Carbon::now();
    echo $mytime->toDateTimeString();
        ?>
</div>
</body>
</html>


