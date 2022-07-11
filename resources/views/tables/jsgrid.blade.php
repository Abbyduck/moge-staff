

<div class="card-body">
    <div id="jsGrid1"></div>
</div>
<script src="{{asset('assets/plugins/jsgrid/jsgrid.min.js')}}" defer></script>

@section('script')
<script defer>
    $(function () {
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,
            data: {{$data}},
            fields: {{$fields}},

            // data: db.clients,
            // fields: [
            //     { name: "Name", type: "text", width: 150 },
            //     { name: "Age", type: "number", width: 50 },
            //     { name: "Address", type: "text", width: 200 },
            //     { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            //     { name: "Married", type: "checkbox", title: "Is Married" }
            // ]
        });
    });
</script>
@endsection
