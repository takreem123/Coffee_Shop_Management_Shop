<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{

    // use RegistersUsers;
     
  public function user_index(){
      return view('auth.register');
  }
  public function store(Request $request){  
    $validatedData = $request->validate([
        'fullname' => ['required'],
        'address' => ['required'],
        'city' => ['required'],
        'number' => ['required', 'unique:users'],
        'email' => ['required', 'unique:users'],
        'password' => ['required'],
        'picture' => ['required'],
    ]);
          $register_obj = new User;
    
          $register_obj->fullname = $request->fullname;
          $register_obj->address = $request->address;
          $register_obj->city = $request->city;
          $register_obj->number = $request->number;
          $register_obj->supplier = 0;
          $register_obj->date_of_join = now();
          $register_obj->salary = 0;
          $register_obj->email = $request->email;
          $register_obj->password = bcrypt($request->password);
          $register_obj->role_id = 2;
          $register_obj->status = 1;
          $path = $request->file('picture')->store('avatars', 'public');
          $register_obj->picture = $path;
          //$register_obj->user_id = Auth::id();
          // save data
          $register_obj->save();

        return back()->with('success','Successfuly Added');
      }

      public function showLogin(){
        return view('auth.login');
  
      }
  
      public function login(Request $request){
        $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);
  
      if (Auth::attempt($credentials)) {
            return view('home')->with('success', 'Login Successfult');
        
      }else{
        return back()->with(
            'error', 'Invalid Credentials',
        );
      }
    }

      public function logout(){
        Auth::logout();
        return redirect('home')->with('success','logout Successfuly');
      }

      public function userList(){
        $userData = User::all();
        return view('showUser',['userDataList'=>$userData]);
      }
      public function showUser($id)
      {
          $data =  User::find($id);
           return view('updateUser',['data'=>$data]);
      }
      public function updateUser(Request $request)
      {
          $data = User::find($request->id);
          $data->fullname = $request->fullname;
          $data->address = $request->address;
          $data->city = $request->city;
          $data->number = $request->number;
          $data->supplier = 0;
          $data->date_of_join = now();
          $data->salary = 0;
          $data->email = $request->email;
          $data->password = bcrypt($request->password);
          $data->role_id = 2;
          $data->status = 1;
          // $path = $request->file('picture')->store('avatars', 'public');
          // $data->picture = $path;
          $data->save();
          return redirect('home')->with('success', 'Updated Successfuly');
      }
      public function deleteData($id)
      {
          $data = User::find($id);
          $data->delete();
          return redirect('home')->with('success', 'Deleted Successfuly');
      }
    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
