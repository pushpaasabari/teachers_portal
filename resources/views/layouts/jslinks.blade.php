<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{-- <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
<script>
  function validateForm() {
    let x = document.forms["studentForm"]["student_name"].value;
    let y = document.forms["studentForm"]["subject"].value;
    let z = document.forms["studentForm"]["mark"].value;
    var textRegex = /^[A-Za-z\s]+$/;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    else if (!textRegex.test(x)) {
              isValid = false;
              alert('Name should only contain alphabets.');
              return false;
    } 
    else if (y == "") {
      isValid = false;
      alert("Subject must be filled out");
      return false;
    }
    else if (!textRegex.test(y)) {
              isValid = false;
              alert('Subject should only contain alphabets.');
              return false;
    } 
    else if (z == "") {
      alert("Mark must be filled out");
      return false;
    }
    else if (isNaN(z) || z < 0 || z > 100) {
              isValid = false;
             alert('Mark must be a number between 0 and 100.');
              return false;
    } 
  }
</script>
<script>
  function validateForm() {
    let x = document.forms["studentEditForm"]["student_name_edit"].value;
    let y = document.forms["studentEditForm"]["subject_edit"].value;
    let z = document.forms["studentEditForm"]["mark_edit"].value;
    var textRegex = /^[A-Za-z\s]+$/;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    else if (!textRegex.test(x)) {
              isValid = false;
              alert('Name should only contain alphabets.');
              return false;
    } 
    else if (y == "") {
      isValid = false;
      alert("Subject must be filled out");
      return false;
    }
    else if (!textRegex.test(y)) {
              isValid = false;
              alert('Subject should only contain alphabets.');
              return false;
    } 
    else if (z == "") {
      alert("Mark must be filled out");
      return false;
    }
    else if (isNaN(z) || z < 0 || z > 100) {
              isValid = false;
             alert('Mark must be a number between 0 and 100.');
              return false;
    } 
  }
</script>