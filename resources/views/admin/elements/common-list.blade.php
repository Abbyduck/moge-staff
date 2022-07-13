@extends('admin.layout.app')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{--                        <h3 class="card-title">Responsive Hover Table</h3>--}}

                        <div class="card-tools">
                            @yield('tools')
                        </div>
                    </div>
                    <!-- /.card-header -->

                    @include('tables.default',['data'=>$data,'fields'=>$fields])

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('script')
    <script defer>
        $(function () {
        });
    </script>
@endsection
