@include('layouts.header')
<!-- CSS Start-->
@include('layouts.css')
<!-- CSS End-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Student'S </b>Marks</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{$student_name}} Mark List</p>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S No</th>
                            <th>Subject</th>
                            <th>Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($studentResult as $value)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$value->subject}}</td>
                            <td>{{$value->mark}}</td>
                            <?php $i++; ?>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>

                <p class="mb-3">
                    <a href="{{url('result')}}" class="text-center">Click Here to Check Another Results</a>
                </p>
            </div>
        </div>
    </div>

    @include('layouts.jslinks')
</body>

</html>