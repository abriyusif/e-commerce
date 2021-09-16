<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Response;
class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
   
//0765611006
    /**
     * Where to redirect admins after login
     * 
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance
     * 
     * 
     * @retunr void
     * 
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:normal')->except('logoutUser');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */

     public function showLoginForm()
     {
         return view('admin.auth.login');
     }
     public function showNormalForm()
    {
        return view('frontend.index');
    }
        /**
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         * @throws \Illuminate\Validation\ValidationException
         */

     public function login(Request $request)
     {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
         if(Auth::guard('admin')->attempt([
             'email' => $request->email,
             'password' => $request->password
         ],$request->get('remember')))
         {
          return redirect()->intended(route('admin.dashboard'));
         }
         return back()->withInput($request->only('email','remember'));
     }
    //  User Login
    public function normalLogin(Request $request)
    {
        $this->validate($request,[
            'user_email' => 'required',
            'user_password' => 'required|min:6'
        ]);
        if(Auth::guard('normal')->attempt([
            'email' => $request->user_email,
            'password' => $request->user_password
        ]))
        {
            $data = "";
            if(Auth::check())
            {

                $data = "Authenticated";
            }
            else
            {
                $data = "Not";
            }
            return response()->json(['success_login' => 'Success','auth' => $data]);
            echo $data;

        }
        else
        {

            return response()->json(['login_error' => 'Wrong Email Or Password']);

            
        }

    }
    //End
     /**
      * @param Request $request
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
      public function logout(Request $request)
      {
          Auth::guard('admin')->logout();
          $request->session()->invalidate();
          return redirect()->route('admin.login');
      }
      public function logoutUser(Request $request)
    {
        Auth::guard('normal')->logout();
        $request->session()->invalidate();
        return response()->json(['user_logged_out' => 'loggedout']);
    }
    }
