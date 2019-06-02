<?php
//
//namespace App\Http\Controllers\admin;
//
//use App\Role;
//use App\User;
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
//
//class UserController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function __construct()
//    {
//        $this->middleware(['auth' , 'auth.admin']);
//    }
//
//    public function index()
//    {
//        $users =null;
//        if(Auth::user()->hasAnyRole('user')) {
//            $users = User::all();
//        }
//     return view('admin.user.index',compact('users'));    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        $users = User::all();
//        $roles = Role::all();
//        return view('admin.user.create' ,compact('users','roles'));
//
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $this->validate($request,[
//            'name'=>'required',
//            'email'=>'required|email',
//            'password'=>['required', 'string', 'min:5', 'confirmed'],
//            'phone' =>['required','integer', 'min:0'],
//            'address' => ['required', 'string'],
//            'images'=>'image',
//        ]);
//
//        $user= new User();
////        $role= new Role();
//
////        $role->name= $request->role;
//        $user->name= $request->name;
//        $user->email =$request->email;
//        $user->password =$request->password;
//        $user->phone =$request->phone;
//        $user->address =$request->address;
//
//        if($request->hasFile('featured_image')) {
//                //add the new photo
//                $image = $request->file('featured_image');
//                $fileName = time() . '.' . $image->getClientOriginalExtension();
//                $location = public_path('images/' . $fileName);
//
//                Image::make($image)->resize(100, 200)->save($location);
//            $user->image = $fileName;
//            }
//
//        $user->save();
//            return redirect()->route('user.index')->with('successMsg','User successfully saved');
//
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $user = User::find($id);
//        $user->delete();
//
//        return redirect()->route('user.index')->with('successMsg','user  deleted successfully' );
//        $user->save();
//    }
//}
