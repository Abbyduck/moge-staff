@extends('admin.layout.app-iframe')
@section('main-content')
    <div class="text-center mb-4">
        <h4>编辑人员</h4>
    </div>
    <form id="defaultForm" class="row" method="post" action="{{ route('staffs.update',[$staff->id]) }}">

        {{ method_field('put')}}
        @include('admin.staff.form')

    </form>
@endsection
