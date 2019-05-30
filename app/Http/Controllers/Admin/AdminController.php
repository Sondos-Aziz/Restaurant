<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show admin's information
        $admin  = Admin::first();

        return view('admin.UserProfile.indexAdmin',['admin'=>$admin]) ;
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
        $admin = Admin::find($id);
        return view('admin.UserProfile.editAdminProfile',compact('admin'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'image' => 'image',         //:jpeg,jpg,bmp,png
        ]);

        $admin = Admin::find($id);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');

        if($request->hasFile('featured_image')){
           //add the new photo
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(100,200)->save($location);
            $oldFileName = $admin->image;
            //updatw the database
            $admin->image = $fileName;
            //delete the old photo
            Storage::delete($oldFileName);

        }
        $admin->save();
        return redirect()->route('userProfile.index')->with('successMsg','Admin Successfully Updated');
    }


}
