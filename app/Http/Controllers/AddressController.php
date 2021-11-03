<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $addresses = Address::all();
        return view('modules.addresses.index', compact('addresses'));
    }

    public function getAddresses(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $results = Address::orderby('name', 'asc')->select('id', 'name')->get();
        } else {
            $results = Address::orderby('name', 'asc')->select('id', 'name')->where('name', 'ilike', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($results as $result) {
            $response[] = array(
                "id"    => $result->id,
                "text"  => $result->name,
            );
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.addresses.create');
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
        $items =  $request->all();
        $address = Address::create($items);
        return redirect()->route('addresses.index')
            ->with('toast_success', 'Address created successfully');
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
        $address = Address::find($id);
        return view('modules.addresses.edit', compact('address'));
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
        $items = $request->all();
        $address = Address::updateOrCreate(['id'=>$id],$items);
        return redirect()->route('addresses.index')
            ->with('toast_success', 'Address updated successfully');
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
        $address = Address::where('id', $id)->with('employees')->first();

        if(count($address->employees)>0) {
            return redirect()->route('addresses.index')
            ->with('toast_error', 'Address cannot be deleted');
        } else {
            $address->delete();
             return redirect()->route('addresses.index')
                ->with('toast_success', 'Address deleted successfully');
        }
    }
}
