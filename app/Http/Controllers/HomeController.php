<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'name_company' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',

          ]);

          $user = new User();

          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = $request->password;
          $user->type = 'customer';
          $user->save();
          $success['token'] =  $user->createToken('MyApp')->plainTextToken;
          $success['name'] =  $user->name;
          $token = user::where('id',  $user->id)->update(['token'=> $success['token']]); //update
          $device = new Device();
          $device->name = $request->name_company;
          $device->user_id =  $user->id;
          $device->number = $request->phone;
          $device->save();


          return redirect('admin')->with('status', 'Form Data Has Been validated and insert');
    }
}
