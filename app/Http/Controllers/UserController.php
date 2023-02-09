<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {

        return view("index_guest");
    }

    public function loadLoginPage()
    {

        return view('login');
    }

    public function login(Request $request)
    {

        App::setlocale(session('lang'));

        $email = $request->email;
        $password = $request->password;

        if ($request->remember) {
            Cookie::queue('email_cookie', $email);
            Cookie::queue('password_cookie', $password, 2);
        }

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials, true)) {

            $request->session()->put("loginSession", $credentials);

            return redirect(route("item_home_page"));

            // if (Auth::user()->role->role_name == 'admin') {
            //     return redirect('/home');
            // } else {
            //     return redirect('/home');
            // }
        }

        return redirect('/login');
    }

    public function loadRegisterPage()
    {

        App::setlocale(session('lang'));

        $gender_data = Gender::all();
        $role_data = Role::all();

        // dd($gender_data);
        return view('register', [
            'gender_data' => $gender_data,
            'role_data' => $role_data
        ]);
    }

    public function register(Request $request)
    {

        App::setlocale(session('lang'));

        $this->validate($request, [
            'first_name' => 'required|max:25}regex:/[a-zA-Z\s]+$/',
            'last_name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $role_data = Role::where('role_name', '=', $request->role)->first();
        $gender_data = Gender::where('gender_desc', '=', $request->gender)->first();

        $fileName = str_replace("", "_", $request->first_name);
        $fullFileName = $fileName . '.' . $request->picture->getClientOriginalExtension();

        $path = $request->picture->move('images', $fullFileName);

        User::insert([

            'role_id' => $role_data->id,
            'gender_id' => $gender_data->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'display_picture_link' => $path,
            'password' => bcrypt($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        $credentials = [

            "email" => $request->email,
            "password" => $request->password
        ];

        return redirect("/login");
    }

    public function loadProfile(){

        $user_checked = Auth::user()->id;
        $user_data = User::where('id', '=', $user_checked)->get();
        $gender_data = Gender::all();

        return view('profile', [
            'user_data' => $user_data,
            'gender_data' => $gender_data
        ]);

    }

    public function loadSavedPage(){
        
        return view('saved');
    }

    public function editProfile(Request $request){

        $user_checked = Auth::user()->id;
        $user_data = User::find($user_checked);

        $request->validate([
            'first_name' => 'required|max:25|regex:/[a-zA-Z\s]+$/',
            'last_name' => 'required|max:25|regex:/[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        ]);

        if ($request->picture != '') {

            if ($user_data->display_picture_link != ''  && $user_data->display_picture_link != null) {
                $prev_file = $user_data->display_picture_link;
                unlink($prev_file);
            }

            $image = time() . '.' . $request->picture->getClientOriginalExtension();

            $new_path = $request->picture->move('images', $image);
        }

        User::where('id', '=', $user_checked)->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "display_picture_link" => $new_path,
            "password" => bcrypt($request->password)
        ]);

        return redirect('/saved');

    }
}
