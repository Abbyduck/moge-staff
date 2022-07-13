@extends('admin.elements.common-list')
@section('tools')
        <button class="btn btn-primary" data-toggle="modal" data-target="#newStaff">新增{{ __('zh.staff') }}</button>
        <button class="btn btn-success">导出Excel</button>
{{--    <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}
{{--        --}}
{{--        <div class="input-group-append">--}}
{{--            <button type="submit" class="btn btn-default">--}}
{{--                <i class="fas fa-search"></i>--}}
{{--            </button>--}}
{{--            --}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
