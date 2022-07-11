<div class="card">
    <div class="card-header">
        {{--                        <h3 class="card-title">Responsive Hover Table</h3>--}}

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0 ">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                @foreach($fields as $field=>$fieldSet)


                    <th>{!! __("zh.$field") !!}
                    @if(isset($fieldSet['sortable']))
                        <a class="fa fa-fw fa-sort" href="{{ url()->current() }}"></a>
                    @endif
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    @foreach($fields as $field=>$fieldSet)


                    @if($field==='action')
                        <td>a {!! __('zh.action') !!}</td>
                    @else
                    <td>
                    @switch($fieldSet)
                        @case("")
                        <span class="badge alert-danger rounded-pill">{{$item->$field}}</span>
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


<!-- /.card-body -->
</div>
<!-- /.card -->

{!! $data->links() !!}

@section('script')
<script defer>
    $(function () {
    });
</script>
@endsection
