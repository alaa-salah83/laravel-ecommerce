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
    <section class="contact_section ">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3379.755870441793!2d36.1811215!3d32.1028831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b73d1eb51be21%3A0xc4daca834a1e6988!2sThe%20Hashemite%20University!5e0!3m2!1sen!2sjo!4v1719599350985!5m2!1sen!2sjo"  width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- end hero area -->
<br><br>
<!-- info section -->
@include('home.footer')

</body>
</html>





