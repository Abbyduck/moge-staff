@php
    $query = '';
    $fa_sort = request('_sort_column') === null ? true : (request('_sort_column') === $field ? false : true);
    $fa_desc = false;
    $fa_asc = false;

    if(request('_sort_type') && request('_sort_column')==$field){

        $fa_desc = request('_sort_type') === 'desc' ? true : false;

        if(request('_sort_type') === 'asc'){

            $query .= "?_sort_column={$field}&_sort_type=desc";
            $fa_asc = true;
        }
    }else{
        $query .= "?_sort_column={$field}&_sort_type=asc";
    }

@endphp
<a @class(["fa", "fa-fw" ,
"fa-sort"=>$fa_sort,
"fa-sort-desc"=>$fa_desc,
"fa-sort-asc"=>$fa_asc
]) href="{{ url()->current().$query }}"> </a>
