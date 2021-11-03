<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\EmpDetail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $addr = ($request->has('addr')) ? $request->input('addr') : null;

        if($addr) {
            $employees = User::role('employee')->whereHas('details', function($q) use ($addr) {
                $q->where('address_id', $addr);
            })->with('details.address')->get();
        } else {
            $employees = User::role('employee')->with('details.address')->get();
        }
        return view('modules.employees.index', compact('employees'))->with('addr', $addr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit = null;
        return view('modules.employees.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'confirm-password' => 'same:password|required_if:password,!=,null',
            'roles' => 'required',
        ]);

        $input = $request->all();
        if($input['password']!=null) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = Hash::make('secretagent');
        }
        $user = User::create($input);
        $user->assignRole($input['roles']);
        $detail = [];
        $detail['emp_num'] = $input['emp_num'];
        $detail['address_id'] = $input['address_id'];
        EmpDetail::updateOrCreate(['user_id' => $user->id], $detail);
        return redirect()->route('employees.index')
            ->with('toast_success', 'User created successfully');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = User::where('id', $id)->with('details.address')->first();
        $edit = true;
        return view('modules.employees.edit', compact('employee', 'edit'));
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
        //
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $user = User::where('id', $id)->first();
        $user->name = $input['name'];
        $detail = [];
        $detail['emp_num'] = $input['emp_num'];
        $detail['address_id'] = $input['address_id'];
        EmpDetail::updateOrCreate(['user_id' => $user->id], $detail);
        return redirect()->route('employees.index')
            ->with('toast_success', 'User created successfully');
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
        $user = User::where('id', $id);
        $user->delete();
        return redirect()->route('employees.index')
            ->with('toast_success', 'User deleted successfully');
    }

    public function history()
    {
        $employees = User::role('employee')->onlyTrashed()->with('details.address')->get();
        return view('modules.employees.history', compact('employees'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();
        return redirect()->route('employees.history')
            ->with('toast_success', 'User restored successfully');   
    }
}
