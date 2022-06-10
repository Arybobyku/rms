<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function User(){
        $data = User::all();
        return view('nav/user',['data_user'=>$data]);
    }

    public function approve(Request $request){
       $data =  User::where('id',$request['id'])->update([
            'role'=>1,
        ]);
        return redirect('user')->with('status',"diAktifkan");
    }

    public function reject(Request $request){
        $data =  User::where('id',$request['id'])->update([
            'role'=>0,
        ]);

        return redirect('user')->with('status',"diNonaktifkan");
    }
}
