@extends('admin.elements.common-list')
@section('tools')
    <button class="btn btn-primary openBtn" data-toggle="modal" data-target="#newStaffModal">
        <i class="fa fa-plus"></i> 新增
    </button>
    <button class="btn btn-success" data-toggle="modal" data-target=".haha" > <i class="fa fa-download"></i>
        导出Excel</button>
@endsection
@section('modal')

<div class="modal fade" id="newStaffModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">新增人员</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="newStaff" >
                                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label >姓名</label>
                        <input type="text" name="name" class="form-control " placeholder="输入姓名" required>
                    </div>
                    <div class="form-group">
                        <label >考勤编号</label>
                        <input type="text" name="attendance_no" class="form-control" placeholder="输入考勤编号" required>
                    </div>
                    <div class="form-group">
                        <label >邮箱</label>
                        <input type="email" name="email" class="form-control "  placeholder="输入邮箱" required>
                    </div>
                    <div class="form-group">
                        <label >部门</label>
                        <select name="department_id" class="form-control ">
                            @foreach($departments as $id=>$dname)
                                <option value="{{$id}}">{{$dname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >入职日期</label>
                        <input type="date" name="entry_date" class="form-control">

                    </div>

                    <div class="form-group">
                        <label >生日</label>
                        <input type="date" name="birthday" class="form-control" >
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-dark" >新增</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
