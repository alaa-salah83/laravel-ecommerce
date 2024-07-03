<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    @include('home.css')
</head>

<body>
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
</div>
<!-- end hero area -->

<!-- shop section -->
@include('home.product')
<!-- end shop section -->


<!-- info section -->
@include('home.footer')

</body>
</html>

