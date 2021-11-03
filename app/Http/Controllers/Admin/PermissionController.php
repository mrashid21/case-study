<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Model\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $permissions = Permission::whereNull('parent_id')->with('children')
            ->orderBy('id', 'asc')->paginate(10);
        return view('admins.permissions.index', compact('permissions'));
    }

    public function getPermissions(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $results = Permission::whereNull('parent_id')->orderby('name', 'asc')->select('id', 'name')->get();
        } else {
            $results = Permission::whereNull('parent_id')->orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($results as $result) {
            $response[] = array(
                "id" => $result->id,
                "text" => $result->name,
            );
        }

        echo json_encode($response);
        exit;
    }

    public function create() 
    {
        return view('admins.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permission = Permission::create($request->all());
        
        return redirect()->route('permissions.index')->with('success', 'Permission successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roleHasPermission = DB::table('role_has_permissions')->where('permission_id', $id)->count();

        if ($roleHasPermission > 0) {
            $type = 'warning';
            $message = 'Permission unsuccessfully deleted';
        }
        else {
            Permission::find($id)->delete();
            $type = 'success';
            $message = 'Permission successfully deleted';
        }

        return redirect()->route('permissions.index')->with($type, $message);
    }
}
