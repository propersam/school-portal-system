@extends('layout.app')

@section('content')

    <!-- breadcumb-area start -->
    <div class="breadcumb-area bg-img-1 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>About us</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>/</li>
                            <li>about</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->

    <!-- .about-style-area start -->
    <div class="about-style-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-images black-opacity">
                        <img src="assets/images/about/about.png" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about-style-wrap">
                        <h3>About SureEdu School Portal</h3>
                        <p>
                            SureEdu School Portal offers the best digital platform for you to manage your school
                            operations, administrators, educators, parents and pupils/students all in one platform.
                            The surest school management portal for Schools in Nigeria.
                        </p>
                        <p>
                            Our platforms are created to meet your school requirements with good technical support.
                            We are currently running a promo now that you wouldn't want to miss:
                        </p>
                        <ul>
                            <li>Free set-up fee</li>
                            <li>Very cheap school administration running cost.</li>
                            <li>Increase in school administration efficiency.</li>
                            <li>Easy students admission process.</li>
                            <li>Online database of results, students and teachers.</li>
                            <li>Easy class management.</li>
                            <li>Student Attendace</li>
                            <li>Time-table</li>
                            <li>Online results checking for students and parents.</li>
                            <li>Email and SMS alert for parents and students.</li>
                            <li>Online Assignment(Admin can post assignment online for students)</li>
                        </ul>
                        <p>
                            Recommended for: Crèche, Nursery and Primary schools
                        </p>
                        <p>
                            Get in touch with us today. Our scalable innovations are fully customized to meet
                            individual school’s specification.
                            <br/>
                            <a href="{{route('contact')}}" class="cr-btn">
                                <span>Contact Us</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .about-style-area end -->

    <!-- .service-our-company start -->
    <div class="service-our-company">
        <div class="company-service-img">
            <!-- <img src="assets/images/teacher/teacher2/3.jpg" alt=""> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-male-cartoon-pointing-to-white-board"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Conducive Learning Environment</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-microscope-side-view"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Well Equipped Library</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-chemistry-flask-with-liquid-inside"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Standard I.C.T Facility</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-diploma"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Nigeria - British Curriculum</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-bus-side-view"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Efficient Transportation System</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="service-items">
                                <div class="company-service-icon">
                                    <span class="flaticon-meeting"></span>
                                </div>
                                <div class="service-info">
                                    <h2>Music and French Classes</h2>
                                    <p>A certified teacher is a teacher who has earned credentials from an authoritative
                                        source, such as the govern</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .service-our-company end -->

@endsection
