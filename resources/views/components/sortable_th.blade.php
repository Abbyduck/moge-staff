@php
    $query = '';
    $fa_sort = request('sort') === null ? true : (request('sort') === $field ? false : true);
    $fa_desc = false;
    $fa_asc = false;

    if(request('direction') && request('sort')==$field){

        $fa_desc = request('direction') === 'desc' ? true : false;

        if(request('direction') === 'asc'){

            $query .= "?sort={$field}&direction=desc";
            $fa_asc = true;
        }
    }else{
        $query .= "?sort={$field}&direction=asc";
    }

@endphp
<th>{!! __("zh.$field") !!}<a @class(["fa", "fa-fw" ,
"fa-sort"=>$fa_sort,
"fa-sort-desc"=>$fa_desc,
"fa-sort-asc"=>$fa_asc
    ]) href="{{ url()->current().$query }}"> </a></th>
