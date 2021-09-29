<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\toDo;

use  App\Models\addList;



use Auth;

class userController extends Controller
{

    public function __construct(){

        // $this->middleware('studentCheck',['except' => ['login','doLogin','signup','doSignup'] ]);
  
      }


    //sign up func
    public function signup(){
        return view('signup');
    }

    //sign up add to dc func
    public function doSignup(Request $request){
  
        $data =    $this->validate($request,[
            "name"     => "required|min:6",
            "email"    => "required|email",
            "phone"    => "required|digits:11",
            "password" => "required|min:6|max:10"
        ]);

        $data['password']   =  bcrypt($data['password']); 
        
        $op = toDo :: create($data);
        if($op){
            $message = 'Data Inserted';
        }else{
            $message= "Error Try Again";
        }
        
        session()->flash('Message',$message);
        session()->put('name',$request->name);
        session()->put('email',$request->email);
        session()->put('phone',$request->phone);
        // return view('dash',['data' => $data]);

        return redirect(url('/login'));

    }
    

    //sign in func
    public function login(){
        return view('login');
    }

        //sign up add to dc func
        public function doLogin(Request $request){
  
            $data =    $this->validate($request,[
                "password"     => "required|min:6",
                "email"        => "required|email"
          ]);
        
        
          $status = false;
        
          if($request->R_me){
              $status = true;
          }
        
        
            if(auth()->attempt($data,$status)){
        
                 return redirect(url('/dash'));
        
            }else{
                session()->flash('Message','Error In Your Credintials');
                return redirect(url('/login'));
            }
    
        }


       
        public function tasks(){

            $data =  addList::where('user_id',auth()->user()->id)->get();
            return view('tasks',['data' => $data]);
       
          }


          public function delete($id){
            // logic ...
       
            $op = toDo::where('id',$id)->delete();
       
            if($op){
               $message= "Deleted";
            }else{
               $message= "Error Try Again";
            }
       
            session()->flash('Message',$message);
       
            return redirect(url('/users'));
       
         }




    public function create(){
        // return view('dash',['data' => $request->except(['_token'])]);
        return view('create');
    }
 
 
    public function addTask(Request $request){
        // return view('dash',['data' => $request->except(['_token'])]);
        $data =    $this->validate($request,[
            "task_date"     => "required",
            "time_from"    => "required",
            "time_to"    => "required",
            "task_title" => "required|min:3|max:15",
            "task_desc" => "required|min:6|max:50",
            "user_id" => "required",
        ]);
        
        $op = addList :: create($data);
        if($op){
            $message = 'Data Inserted';
        }else{
            $message= "Error Try Again";
        }

        session()->flash('Message',$message);
        // return view('dash',['data' => $data]);

        return redirect(url('/tasks'));
    }



}
