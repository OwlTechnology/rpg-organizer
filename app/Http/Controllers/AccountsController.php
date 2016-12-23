<?php

namespace App\Http\Controllers;

use App\User;
use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function logout(){
        Auth::logout();

        return redirect("/");
    }

    /**
     * Show the login page.
     *
     * @return View
     */
    public function showLogin(){
        if(Auth::check()){
            return redirect("/me");
        }else{
            return view('accounts.login');
        }
    }

    /**
     * Show the signup page.
     *
     * @return View
     */
    public function showSignup(){
        return view('accounts.signup');
    }

    /**
     * Attempt to login
     *
     * @return View
     */
    public function login(Request $request){
        if(Auth::check()){
            return redirect("/me");
        }

        $username = $request->input("username");
        $password = $request->input("password");

        if(Auth::attempt([
            "name" => $username,
            "password" => $password
        ])){
            return redirect("/me");
        }else{
            return redirect("/login")->with([
                "message" => "Bad username/password combination."
            ]);
        }
    }

    /**
     * Create a new user
     *
     * @param Request $request
     * @return View
     */
    public function signup(Request $request){
        $username = strtolower($request->input("username"));
        $email = strtolower($request->input("email"));
        $password = $request->input("password");
        $password_confirm = $request->input("confirm-password");

        // Check to make sure entered passwords match
        if($password !== $password_confirm){
            return redirect('/signup')->with([
                "error" => true,
                "message" => "Passwords do not match."
            ]);
        }

        // Create user
        $user = new User;

        $user->name = $username;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        return redirect("/login")->with([
            "message" => "Account created successfully! Please login."
        ]);
    }

    public function showHomePage(Request $request){

        return view("accounts.user.overview");
    }

    public function showCampaigns(){
        $campaigns = Campaign::where("dm", Auth::user()->id)->get();
        $campaignsUserIsIn = Auth::user()->campaignsUserIsIn;

        return view("accounts.user.campaigns")->with([
            "campaigns" => $campaigns,
            "campaignsUserIsIn" => $campaignsUserIsIn
        ]);
    }
}
