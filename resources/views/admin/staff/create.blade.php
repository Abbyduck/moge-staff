@extends('admin.layout.app-iframe')
@section('main-content')
    <div class="text-center mb-4">
        <h4>新增人员</h4>
    </div>
    <form id="defaultForm" class="row" method="post" action="{{ route('staffs.store') }}">
        @include('admin.staff.form')
    </form>
@endsection
