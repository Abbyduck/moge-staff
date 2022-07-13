@extends('admin.elements.common-list')
@section('tools')
    <button class="btn btn-primary" data-toggle="modal" data-target="#newStaff">
        <i class="fa fa-plus"></i> 新增
    </button>

    <button class="btn btn-success"> <i class="fa fa-download"></i> 导出Excel</button>
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
@section('modal')

    <div class="modal fade" id="newStaff">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">新增</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
{{--                <div class="modal-footer justify-content-between">--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
