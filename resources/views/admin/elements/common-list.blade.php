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


                    <div class="card-body table-responsive p-0 ">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                @foreach($fields as $field=>$fieldSet)


                                    @if(isset($fieldSet['sortable']))
                                        {{--                        <th> @sortablelink($field)</th>--}}
                                        <th>{!! __("zh.$field")  !!}
                                            @include('components.sortable_th',['field'=>$fieldSet['sortable']===1?$field:$fieldSet['sortable']])
                                        </th>
                                    @else
                                        <th>{!! __("zh.$field")  !!}</th>

                                    @endif

                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    @foreach($fields as $field=>$fieldSet)

                                        @if($field==='action')
                                            <td >
                                                <div class="action d-inline-block">
                                                    @foreach($fieldSet as $action)

                                                        <button class="btn btn-sm btn-icon {{$action}}"
                                                                data-id="{{$item->id}}">

                                                            @if($action=='edit')

                                                                <i class="fa fa-pencil-square-o"> </i>
                                                            @elseif($action=='del')
                                                                <i class="fa fa-trash-o" ></i>
                                                            @endif
                                                        </button>
                                                    @endforeach
                                                </div>

                                            </td>
                                        @else
                                            <td>
                                                @switch($fieldSet)
                                                    @case("bg-label")
                                                    <span class="badge rounded-pill">{{$item->$field}}</span>
                                                    @default
                                                    {{$item->$field}}
                                                @endswitch
                                            </td>

                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {!! $data->links() !!}
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection
