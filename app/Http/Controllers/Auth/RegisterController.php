<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

// Import Class Str
use Illuminate\Support\Str;

// Import Mail Facades
use Illuminate\Support\Facades\Mail;

// Import Class Mauk
use App\Mail\EmailVerifikasi;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // Di nonaktifkan agar user tidak login
        // $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return redirect('/login')->with('msg', 'silahkan cek email di ' . '<b>' . $request->email . '</b>');
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
            'date_birth' => ['required'],
            'gender' => ['required'],
            'provinci' => ['required'],
            'district' => ['required'],
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token'   => Str::random(30),
            'date_birth' => $data['date_birth'],
            'gender' => $data['gender'],
            'provinci' => $data['provinci'],
            'district' => $data['district'],
        ]);

        Mail::to($user->email)->send(new EmailVerifikasi($user));
    }

    public function verification($token, $id)
    {
        $user = User::findOrFail($id);
        if ($user->token != $token) {
            return redirect('login')->with('msg', 'Terjadi kesalahan validasi akun');
        }
        // Validasi setelah user telah terdaftar
        if ($user->status == 1) {
            return redirect('/')->with('msg', 'Anda sudah terdaftar di Aliim.id');
        }
        // Ubah status user
        $user->status = 1;
        $user->save();
        $this->guard()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
