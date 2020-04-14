<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        try {
           $attempt = Auth::attempt(['email' => $email, 'password' => $password]);
           if ($attempt) {
                $user = User::where('email', '=', $email)->firstOrFail();
                Auth::login($user, TRUE);
                if ($user->roles->first()->name == 'Administrator'){
                    return redirect(route('admin.index'));
                } elseif ($user->roles->first()->name == 'Employee') {
                    return redirect(route('employee.index'));
                } elseif ($user->roles->first()->name == 'Owner') {
                    return redirect(route('owner.index'));
                } elseif ($user->roles->first()->name == 'Buyer') {
                    return redirect(route('buyer.index'));
                }
           } else {
               session()->flash('danger', 'Email / Password yang anda masukkan salah !');
               return redirect()->back();
           }
        } catch (Exception $e) {
            echo "error";
        }
    }
}
