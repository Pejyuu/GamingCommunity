<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Auth;
use Socialite;

class AuthController extends Controller
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

    public function redirectToProvider()
        {
            return Socialite::driver('discord')->redirect();
        }

        /**
         * Obtain the user information from provider.  Check if the user already exists in our
         * database by looking up their provider_id in the database.
         * If the user exists, log them in. Otherwise, create a new user then log them in. After that
         * redirect them to the authenticated users homepage.
         *
         * @return Response
         */
        public function handleProviderCallback()
        {
            $user = Socialite::driver('discord')->user();

            $authUser = $this->findOrCreateUser($user, 'discord');
            Auth::login($authUser, true);
            return redirect($this->redirectTo);
        }

        /**
         * If a user has registered before using social auth, return the user
         * else, create a new user object.
         * @param  $user Socialite user object
         * @param $provider Social auth provider
         * @return  User
         */
        public function findOrCreateUser($suspect)
        {

            $user = User::updateOrCreate(
              ['discord_id' => $suspect->id],
              [
              'name'     => $suspect->name,
              'email'    => $suspect->email,
              'discord_id' => $suspect->id,
              'avatar' => $suspect->avatar,
          ]);

          return $user;
        }

        public function logout()
        {
            Auth::logout();
            return redirect($this->redirectTo);
        }
}
