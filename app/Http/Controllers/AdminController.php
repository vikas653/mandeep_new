<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class AdminController extends Controller {
    public function index() {
        // if (Auth::user()->role_id !== 1) {
        //     return redirect('/login');
        // }
        $customer = User::where('role_id',2)->count();
        $publisher = User::where('role_id',3)->count();
        $content_writer = User::where('role_id',4)->count();
        $moderation = User::where('role_id',5)->count();

    
        return view('admin.home.home',compact('customer','publisher','content_writer','moderation'));
    }

    public function user(){
        $data = User::whereIn('role_id', [2, 3, 4, 5])->paginate(10);
        return view('admin.user.user', compact('data'));
    }
    public function user_create(){
        return view('admin.user.user_create');
    }


    public function add_user(Request $request){
        $data= $request->validate([
            'role_id' => 'required',
            'name'=> 'required',
            'email'=> 'required',
            'phone' => 'required',
            'address'=>'required',
            'password'=> 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        $result= User::create($data);
        return redirect()->back();
    }
    public function edit_user(Request $request , $id){

        $data = User::where('id',$id)->first();
        return view('admin.user.user_edit', compact('data'));
    }

    public function update_user(Request $request , $id){
        $data = $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        if($request->has('password') && !empty($request->password)){
            $data['password'] = Hash::make($request->password);
        };
        $result =User::where('id',$id)->update($data);
        return redirect()->back();
    }
    public function delete(Request $request, $id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }
}