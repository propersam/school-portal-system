@extends('layout.app')

@section('content')
    <!-- slider-area start -->
    <div class="slider-area">
        <div class="slider-active">
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/1.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/2.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/3.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/4.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/5.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/6.png')}}" alt="" class="slider">
            </div>
            <div class="slider-items">
                <img src="{{asset('assets/images/slider/7.png')}}" alt="" class="slider">
            </div>
        </div>
    </div>
    <!-- slider-area end -->

    <!-- featured-area start -->
    <div class="featured-area featured-area2 ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 fix">
                    <div class="featured-wrap">
                        <i class="flaticon-quality-1"></i>
                        <h2>MISSION: </h2>
                        <p>
                            ## school mission statement
                        </p>
                        <a href="#" class="readmore">Read More</a>
                    </div>
                    <div class="featured-wrap">
                        <i class="flaticon-clipboard-with-pencil"></i>
                        <h2>VISSION:</h2>
                        <p>## school vision statement</p>
                        <a href="#" class="readmore">Read More</a>
                    </div>
                    <div class="featured-wrap">
                        <i class="flaticon-graduation-student-black-cap"></i>
                        <h2>SCHOOL ANTHEM:</h2>
                        <p>## school anthem</p>
                        <a href="#" class="readmore">Read More</a>
                    </div>
                    <div class="featured-wrap">
                        <i class="flaticon-person-learning-by-reading"></i>
                        <h2>Why Choose Us</h2>
                        <p>## ...</p>
                        <a href="#" class="readmore">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->
    
    <!-- SureEdu promo Section start -->
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-3" id="basecolor">Amazing Promo Package!</h1>
                <p class="lead">Fill out the form below and a Sure-Edu representative will be in touch</p>
                <hr class="my-2">

                <div class="row">
                    <div class="col-md-8">
                    <h4>About SureEdu</h4>
                        SureEdu School Portal is the premier online school management solution, designed and developed by Suretrade Business Solutions Limited.
                        <br><a href="#">Learn more about SureEdu</a><br /><br />
                        
                        <h4>Our Customers</h4>
                        Over the years, SureEdu has helped so many schools across the country to improve on their administrative efficiency, increase their productivity and prestige.
                        <br /> <a href="#"> more about our Customers. </a> <br /><br />

                        <h4>Phone</h4>
                        +234 802 292 8560<br>
                        09055651477  <br /><br />

                        <h4>Email</h4>
                        support@SureEdu.SureTradebsl.com<br>
                        marketing@SureEdu.SureTradebsl.com
                    </div>
                    
                    <div class="col-md-4">
                        <div class="contact-wrap">
                            <!-- <h4>Fill out the form below and a Sure-Edu representative will be in touch</h4> -->
                            <div class="cf-msg"></div>
                            <form action="#" method="post" id="cf">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="Name" id="subject" name="name">
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="Phone Number" id="subject" name="Phone Number">
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="Email Address" id="subject" name="emailaddress">
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="School Name" id="subject" name="schoolname">
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="text" placeholder="School Address" id="subject" name="schooladdress">
                                    </div>
                                    <div class="col-xs-12">
                                        <textarea class="contact-textarea" placeholder="Message" id="msg"
                                                  name="msg"></textarea>
                                    </div>
                                    <div class="col-xs-12">
                                        <button id="submit" class="cont-submit btn-contact" name="submit">Submit Request
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <!-- SureEdu promo Section end -->
@endsection
