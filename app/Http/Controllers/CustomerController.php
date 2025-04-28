<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerController extends Controller {
    public function index() {
        
    
        return view('customer.home.home');
    }
    public function order(){
        $data = User::whereIn('role_id', [2, 3, 4, 5])->paginate(10);
        return view('customer.order.order', compact('data'));
    }
    public function order_create(){
        return view('customer.order.order_create');
    }


    public function add_order(Request $request){
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
    public function edit_order(Request $request , $id){

        $data = User::where('id',$id)->first();
        return view('admin.user.user_edit', compact('data'));
    }

    public function update_order(Request $request , $id){
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
    public function order_delete(Request $request, $id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }
    
}