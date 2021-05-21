<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{

    public function create() {
        return view('registration-form');
    }
    function index()
    {
     return view('login');
    }

    // Registration Form Validation
    public function store(Request $request) {

        $request->validate(
            [
                'name'              =>      'required|regex:/^[\pL\s\-]+$/u|max:20',
                'email'             =>      'required|email|unique:users,email',
                'password'          =>      'required|min:8',
            ]
        );
        $dataArray      =       array(
            "name"          =>          $request->name,
            "email"         =>          $request->email,
            "password"      =>          Hash::make($request->password)
        );

        $user=User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Success! Registration completed");
        }
        else {
            return back()->with("failed", "Alert! Failed to register");
        }
    }


    function checklogin(Request $request)
    {
         $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:8'
            ]
        );

         $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
         );

         if(Auth::attempt($user_data))
          {
              return redirect('main/dashboard');}
         else
         {
              return back()->with('error', 'Wrong Login Details');}
    }
    public function inde(){
      $id=Auth::user()->id;
      $users = DB::select('select * from tasks where user_id='.$id);
      return view('dashboard',['users'=>$users]);
    }
    function dashboard()
      {
          return view('dashboard');
      }

    function logout()
      {
          Auth::logout();
          return redirect('main');
      }


}
?>
