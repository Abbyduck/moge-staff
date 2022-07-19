@extends('admin.elements.common-list')
@section('tools')
    <button class="btn btn-primary create-item" >
        <i class="fa fa-plus"></i> 新增
    </button>
    <button class="btn btn-success" data-toggle="modal" data-target=".haha" > <i class="fa fa-download"></i>
        导出Excel</button>
@endsection
@section('modal')

@endsection
@push('scripts')
<script defer>

    $(document).ready(function () {
        $("#newStaff").submit(function (e) {
            $(".invalid-feedback").remove();
            $("form input").removeClass('is-invalid');
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '{{ route('staffs.store') }}' ,
                dataType: 'json',
                data: $("#newStaff").serialize(),
                success: function (data) {
                    if(data.code === 1){
                        success('成功', (function () {
                            $("#newStaffModal").modal('hide');
                            window.location.reload();
                        }))
                    }else{
                        $.each(data.errors,function (errField,err) {
                            console.log(errField,err)
                            let errHtml = "<span class='error invalid-feedback'>" + err[0]+ "</span>";
                            $("input[name="+errField+"]").addClass('is-invalid').closest('.form-group').append(errHtml);
                        })
                    }


                },
            });
        })

    })


</script>
@endpush
