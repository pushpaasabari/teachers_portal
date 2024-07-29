<script>
    $(document).ready(function () {
        $(document).on('click','.studentedit',function(){
            var stud_id =  $(this).data('stud_id');//$(this).val();
            // alert(stud_id);
            $('#studentedit').modal('show');

            $.ajax({
                url: "{{url('get_student')}}",
                type: "POST",
                data: {
                    id: stud_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    $('#student_name').val(response.student.name);
                    $('#stud_id').val(stud_id);
                    $('#subject').val(response.student.subject);
                    $('#mark').val(response.student.mark);
                }
            });
    });
});      
</script>