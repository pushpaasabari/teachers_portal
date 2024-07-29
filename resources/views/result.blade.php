@include('layouts.header')
<!-- CSS Start-->
@include('layouts.css')
<!-- CSS End-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Student </b>Portal</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Check Your Marks</p>

                <form action="{{url('result')}}" name="StudentResult" method="post">
                    {{ csrf_field() }}
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="student_name" name="student_name" class="form-control" placeholder="Name" Required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-chalkboard-teacher"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" name="pwd" class="form-control" placeholder="DOB" disabled>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Get Mark's</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
                {{-- <p class="mb-3">
                    <a href=""></a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->




    <!-- Scripts /Js/Jquery Start-->
    @include('layouts.jslinks')
    <!-- Scripts /Js/Jquery End-->


</body>

</html>