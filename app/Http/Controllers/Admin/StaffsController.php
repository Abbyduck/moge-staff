<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Staffs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Log;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {

        $staffs = Staffs::sortable()->paginate(15)->withQueryString();
        $departments = Department::all()->pluck('name','id');

        foreach ($staffs as &$staff) {
            $staff->department = $departments[$staff->department_id] ?? '';
        }

        return view('admin.staff.list',['data'=>$staffs,'departments'=>$departments,'fields'=>config('admin_tables.staff_list')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $res =['code' => 1];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'attendance_no' => 'required|unique:staffs',
            'email' => 'required|unique:staffs',
        ]);

        if ($validator->fails()) {
            $res['code'] = -1;
            $res['errors'] = $validator->errors();
        }else{
            $staff = $request->except(['_token']);
            Staffs::create($staff);
        }

        return response()->json($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = Staffs::find($id);
        $departments = Department::all()->pluck('name','id');

        return view('admin.staff.edit', ['departments'=>$departments,'staff'=>$staff]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'attendance_no' => ['required','numeric',
                Rule::unique('staffs')->ignore($id),],
            'email' => ['required',Rule::unique('staffs')->ignore($id),],
        ]);


        Staffs::find($id)->update($request->except(['_token','_method']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
