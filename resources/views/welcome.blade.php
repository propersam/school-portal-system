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
@endsection
