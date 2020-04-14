<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        try {
           $attempt = Auth::attempt(['email' => $email, 'password' => $password]);
           if ($attempt) {
                $user = User::where('email', '=', $email)->firstOrFail();
                Auth::login($user, TRUE);
                if ($user->roles()->first->name == 'Administrator'){
                    return redirect(route('admin.index'));
                }
           }
        } catch (Exception $e) {
            echo "error";
        }
    }
}
