<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $id = 2;
        $role = Role::find($id);
        $data = $role->user()->get();
        $dataTotal = $role->count();

        return view('pages.admin.index', compact('data', 'dataTotal'));

        // return $dataTotal;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Admin.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'data must be filled..!',
        ];

        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'picture' => 'required',
            'password' => 'required',
        ], $message);

        $validasi['password'] = bcrypt($validasi['password']);
        $validasi['is_active'] = $validasi['is_active'] ?? 0;
        $validasi['role_id' ] = 2;
        $validasi['created_by'] = auth('sanctum')->user()->name;
        
        $fileName = time().$request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('uploads/admins',$fileName);
        $validasi['picture'] = $path;

        User::create($validasi);

        return redirect('admin')->with([
            'success' => 'data saved successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find($id);

        return view('pages.admin.profile', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);

        return view('pages.admin.edit', compact('admin'));
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
        $message = [
            'required' => 'data must be filled..!',
        ];

        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'picture' => 'required',
            'password' => 'required',
        ], $message);

        $validasi['password'] = bcrypt($validasi['password']);
        $validasi['is_active'] = $validasi['is_active'] ?? 0;
        $validasi['role_id' ] = 2;
        $validasi['created_by'] = auth('sanctum')->user()->name;
        
        $fileName = time().$request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('uploads/admins',$fileName);
        $validasi['picture'] = $path;

        User::create($validasi);

        return redirect('admin')->with([
            'success' => 'data saved successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id)->delete();

        return redirect('admin')->with('success', 'Data deleted successfully..!');
    }
    
    public function profile () 
    {
        $role = Role::first();

        
        // return view('pages.Admin.profile');
        $admin = $role->user()->get();
        return $admin;

    }

    
}