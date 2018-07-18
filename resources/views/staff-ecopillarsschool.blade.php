        @extends('layout.app')

        @section('content')

        <!-- breadcumb-area start -->
        <div class="breadcumb-area bg-img-1 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Teacher</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li>Teacher</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->


        <!-- teacher-area start -->
        <div class="teacher-area teacher-area2">
            <div class="container">
                <div class="row">
                    @if ($teachers)
                        @foreach ($teachers as $teacher)
                        <div class="col-md-4 col-sm-6 col-xs-12 col">
                            <div class="teacher-wrap">
                                <div class="teacher-img">
                                    <img style="height: 350px" src="uploads/profile_photos/{{ $teacher->user->photo }}" alt="" />
                                </div>
                                <div class="teacher-content">
                                    <div class="teacher-info">
                                        <h3>{{ $teacher->firstname }} {{ $teacher->lastname }}</h3>
                                        @if ($teacher->classes)
                                        <p>Class: {{ $teacher->classes->name }}</p>
                                        @endif

                                        <ul style="opacity: 0; height: 1px">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                        <hr style="border-top: solid #fff 2px">
                                        <span style="color: #fff">{{ $teacher->description }}</span><br>
                                        @if ($teacher->qualifications)
                                        <span style="color: #fff">( {{ $teacher->qualifications }} )</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No teachers yet</p>
                @endif

                </div>
            </div>
        </div>
        <!-- teacher-area end -->

        @endsection
