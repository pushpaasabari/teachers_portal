@include('layouts.header')
<!-- CSS Start-->
@include('layouts.css')
<!-- CSS End-->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Top Navbar Start-->
    @include('layouts.top-navbar')
    <!-- Top Navbar End-->
    <!-- Main Sidebar Container Start-->
    @include('layouts.left-navbar')
    <!-- Main Sidebar Container End-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('layouts.breadcrumb')
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          {{-- <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div> --}}
          <!-- /.row -->
          <div class="col-12">
            {{-- @include('layouts.alert') --}}
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student DataTable</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S No</th>
                      <th>Name</th>
                      <th>Subject</th>
                      <th>Mark</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach($studentData as $value)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->subject}}</td>
                      <td>{{$value->mark}}</td>
                      <td>
                        <div class="btn-group-xs">
                          <button type="button" class="btn btn-xs btn-default">Action</button>
                          <button type="button" class="btn btn-xs btn-default dropdown-toggle dropdown-icon"
                            data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item studentedit" href="#" data-stud_id="{{$value->id}}">Edit</a>
                            <a class="dropdown-item "
                              href="student_del/{{$value->id}}/{{$value->name}}/{{$value->subject}}"
                              onclick="return confirm('Are you sure to delete {{$value->name}}?')">Delete</a>
                            {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                          </div>
                        </div>
                      </td>
                      <?php $i++; ?>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    {{-- <tr>
                      <th>S No</th>
                      <th>Name</th>
                      <th>Subject</th>
                      <th>Mark</th>
                      <th>Action</th>
                    </tr> --}}
                  </tfoot>
                </table>
              </div>
              <!-- /.card-header -->


              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          {{-- <div class="mb-3 col-3 pb-3"> --}}
            <div class="offset col-1 pb-3">
              <button type="button" class="btn btn-block btn-primary align-right" data-toggle="modal"
                data-target="#modal-md">Add</button>
            </div>
          </div><!-- /.container-fluid -->

      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Footer Start-->
    @include('layouts.footer')
    <!-- Footer End-->


  </div>
  <!-- ./wrapper -->

  <!-- Scripts /Js/Jquery Start-->
  @include('layouts.jslinks')
  <!-- Scripts /Js/Jquery End-->

  <!-- Ajax Start-->
  @include('layouts.ajax')
  @include('layouts.modaledit')
  <!-- SAjax End-->



  <!-- Modal Start-->
  <div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Student Form</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <p>One fine body&hellip;</p> --}}
          <form name="studentForm" id="studentForm" action="{{url('create')}}" method="POST"
            onsubmit="return validateForm()">
            {{ csrf_field() }}
            <div class=" form-group offset-2 col-8">
              <label>Name:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" name="student_name" id="studend_name" class="form-control" required>
              </div>
            </div>
            <div class="form-group offset-2 col-8">
              <label>Subject:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-server"></i></span>
                </div>
                <input type="text" name="subject" id="subject" class="form-control" required>
              </div>
            </div>
            <div class="form-group offset-2 col-8">
              <label>Mark:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-bar-chart"></i></span>
                </div>
                <input type="number" name="mark" id="mark" class="form-control" required>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- Modal End-->


</body>

</html>