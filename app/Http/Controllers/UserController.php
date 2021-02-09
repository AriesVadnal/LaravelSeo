<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:25|min:3',
            'email' => 'required|email|unique:users',
            'tipe' => 'required'
        ]);

        if ( $request->input('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt('1234');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipe' => $request->tipe,
            'password' => $password
        ]);

        return redirect()->route('user.index')->with('success','Data berhasil di input');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
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

        $this->validate($request, [
            'name' => 'required|max:30|min:3',
            'tipe' => 'required'
        ]);

        if ( $request->input('password') ){
           $data_user = [
            'name' => $request->name,
            'tipe' => $request->tipe,
            'password' => bcrypt($request->password)
           ];
        } else {
           $data_user = [
            'name' => $request->name,
            'tipe' => $request->tipe
          ];
        }

        $user = User::findOrFail($id);
        $user->update($data_user);

        return redirect()->route('user.index')->with('success','Data berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','Data berhasil di hapus');
    }
}
