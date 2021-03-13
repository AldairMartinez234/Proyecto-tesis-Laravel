<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;    
use Caffeinated\Shinobi\Models\Permission;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Bitacora;

class RoleController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');    
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $roles=Role::get();
      return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $permissions=Permission::get();
      return view('roles.register',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    $Role = Role::create($request->all());
    $Role->permissions()->sync($request->get('permissions'));
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('roles.show',['Role' => Role::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
         $role = Role::findOrFail($id);

         $permissions = Permission::get();
    
    return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->id);

        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();


        
    }
}
