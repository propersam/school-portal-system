        @extends('layout.app')

        @section('content')

        <!-- breadcumb-area start -->
        <div class="breadcumb-area bg-img-1 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Contact Us</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->

        <!-- contact-area start -->
        <div class="contact-area ptb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="contact-wrap">
                            <h3>Contact form</h3>
                            <div class="cf-msg"></div>
							<form action="#" method="post" id="cf">
								<div class="row">
									<div class="col-sm-6 col-xs-12">
										<input type="text" placeholder="Your Name" id="fname" name="fname">
									</div>
									<div class="col-xs-12 col-sm-6">
										<input type="text" placeholder="Your Email" id="email" name="email">
									</div>
									<div class="col-xs-12">
										<input type="text" placeholder="Subject" id="subject" name="subject">
									</div>
									<div class="col-xs-12">
										<textarea class="contact-textarea" placeholder="Message" id="msg" name="msg"></textarea>
									</div>
									<div class="col-xs-12">
										<button id="submit" class="cont-submit btn-contact" name="submit">Send Massage</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <span class="flaticon-smartphone"></span>
                                    ## phone-1,
                                    ## phone-2
                                </li>
                                <li>
                                    <span class="flaticon-opened-email-envelope"></span>
                                    email-address
                                </li>
                                <li>
                                    <span class="flaticon-placeholder"></span>
                                    School address
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area end -->

            @endsection