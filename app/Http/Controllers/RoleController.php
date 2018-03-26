<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Payment;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PaymentCollection
     */
    public function index()
    {
        return new PaymentCollection(Payment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = request('name');
        $role->save();

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Role successfully created']], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = request('name');
        $role->update();

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Role successfully updated']], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
        } catch (\Exception $e) {
            $e->getCode();
        }
        return response()->json(['status'=>['success' => true, 'message' => 'object deleted'] ], 200);
    }
}
