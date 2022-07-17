
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
                        <td>a {!! __('zh.action') !!}</td>
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

