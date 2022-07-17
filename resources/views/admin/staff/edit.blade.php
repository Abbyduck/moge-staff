@extends('admin.layout.app-iframe')
@section('main-content')
    <div class="text-center mb-4">
        <h4>编辑人员</h4>
    </div>
    <form id="defaultForm" class="row" method="post" action="{{ route('staffs.update',[$staff->id]) }}">
        @csrf
        {{ method_field('put')}}
        <div class="form-group col-xs-12 col-sm-6">
            <label >姓名</label>
            <input type="text" name="name" class="form-control " placeholder="输入姓名" required
                   value="{{old('name') ?? $staff->name ?? ''}}">
        </div>
        <div class="form-group col-xs-12 col-sm-6">
            <label >考勤编号</label>
            <input type="text" name="attendance_no" class="form-control @error('attendance_no')is-invalid @enderror" placeholder="输入考勤编号" required
                   value="{{ old('attendance_no') ?? $staff->attendance_no ??''}}">
            @error('attendance_no')
            <span class='error invalid-feedback'>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-xs-12 col-sm-6">
            <label >邮箱</label>
            <input type="email" name="email" class="form-control "  placeholder="输入邮箱" required
                   value="{{ old('email') ?? $staff->email??''}}">
        </div>
        <div class="form-group col-xs-12 col-sm-6">
            <label >部门</label>
            <select name="department_id" class="form-control">
                @foreach($departments as $id=>$dname)
                    <option value="{{$id}}" @if(isset($staff) && $staff->department_id == $id)
                    checked @endif>{{$dname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6">
            <label >入职日期</label>
            <input type="date" name="entry_date" class="form-control" value="{{$staff->entry_date??''}}">

        </div>

        <div class="form-group col-xs-12 col-sm-6">
            <label >生日</label>
            <input type="date" name="birthday" class="form-control" value="{{$staff->birthday??''}}">
        </div>

        <div class="p-3 text-center col-12">
            <button class="btn btn-dark m-3" type="submit">提交</button>

            <button class="btn btn-default" data-dismiss="modal">取消</button>
        </div>
    </form>
@endsection
