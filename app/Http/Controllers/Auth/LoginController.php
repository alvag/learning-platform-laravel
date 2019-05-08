<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use App\UserSocialAccount;
use DB;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

    public function redirectToProvider(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param string $driver
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function handleProviderCallback(string $driver)
    {
        if (!request()->has('code') || request()->has('denied')) {
            session()->flash('message', ['danger', __('Inicio de sesión cancelado')]);
            return redirect('login');
        }

        $socialUser = Socialite::driver($driver)->user();

        $user = User::whereEmail($socialUser->email)->first();

        if (!$user) {

            try {

                DB::beginTransaction();

                $user = User::create([
                    'name'  => $socialUser->name,
                    'email' => $socialUser->email,
                ]);

                UserSocialAccount::create([
                    'user_id'      => $user->id,
                    'provider'     => $driver,
                    'provider_uid' => $socialUser->id,
                ]);

                Student::create([
                    'user_id' => $user->id,
                ]);

                DB::commit();

            } catch (Exception $e) {
                DB::rollBack();
                session()->flash('message', ['danger', $e->getMessage()]);
                return redirect(route('login'));
            }

        }

        auth()->loginUsingId($user->id);
        return redirect(route('home'));
    }
}
