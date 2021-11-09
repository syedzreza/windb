<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    public function AdminDashboard(){

        return view('admin.maindash');
    }




    public function store(Request $request)
    {
           $request->validate([
               'username'=>'required',
              'password'=>'required',
           ]);
        if (Auth::guard('admin')->attempt(['email'=>$request->get('username'),'password'=>$request->get('password')]))
        {
            return  redirect()->route('admin.dashboard');

        }
        else{
            return redirect()->route('admin.login')->with(['status'=>'login Failed']);
        }
   }

   public function registeradmin(Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|unique:admins',
        'password' => 'required',
       ]);
       if(!$validator->passes()){
           return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
       }
       else{
        $user=   Admin::create([
            'name' =>$request->name,
            'email' =>$request->email,
             'password' =>Hash::make('password'),
        ]);

        }
    return response()->json(['status'=>1, 'msg'=>'Admin Added Successfully']);

   }

    public function destroy(){
        \Illuminate\Support\Facades\Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function addUser(Request $request){
        return view('admin.adduser');
       }


       public function addUserConfirm( Request $request)
       {

        $validator = Validator::make($request->all(),[
             'name' => 'required',
             'email' => 'required|unique:users',
             'address' => 'required',

            ]);
            if(!$validator->passes()){
                return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
            }
            else{
                if($request->hasFile('upload')) {
                    $imageNameArr = [];
                    foreach ($request->upload as $file) {
                        // you can also use the original name
                        $imageName = time().'-'.$file->getClientOriginalName();

                        // Upload file to public path in images directory
                        $file->move(public_path('/images'), $imageName);
                        $imageNameArr[] = $imageName;
                        json_encode($imageName);
                        // Database operation
                    }
                }


             $user=   User::create([
            'name' =>$request->name,
            'email' =>$request->email,

            'address' =>$request->address,
            'file' => implode(",",$imageNameArr)


        ]);


return response()->json(['status'=>1, 'msg'=>'User Added Successfully']);

      }
    }







      public function manageusersdashboard(){

              $userson=User::all();
            $img= explode(" ",$userson);

          return view('admin.manageuser',['user' => $userson]);
      }











public function terminateuser(Request $request,$id){

    // DB::table('users')->where('id', '=', $id)->delete();
      $delete=User::find($id);
      $prev=public_path('images/',$delete->file);
      $temp=explode(',',$delete->file);

    //   dd($temp);
    //   $image=explode(',',$delete->file);
      if($delete){
       if(file_exists($prev)){
        foreach($temp as $image){
            $images[]="images/".trim( str_replace( array('[',']') ,"" ,$image ) );

         }
         foreach($images as $file) {

            // Delete given images
            unlink($file);
     }}
        $delete->delete();
      }
    return redirect()->back()->with(['message'=>'User and all Respective Images Deleted successfully']);

}

public function edit(Request $request,$id){
    $info=User::get()->where('id',$id);

    return view('admin.edit',['info'=>$info]);
}


public function editconfirm(Request $request,$id){
    $infos=User::get()->where('id',$id);

    if($infos){
        User::where('id',$id)->update(['name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        ]);
    }
    return redirect()->route('admin.manageusers')->with(['message'=>'User Updated']);

}

public function imagesdelete(Request $request ,$id){
    $delete=User::find($id);
    $prev=public_path('images/',$delete->file);
    $temp=explode(',',$delete->file);


}



}










