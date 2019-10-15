<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Secao;
use App\Cargo;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'cargo_id' => 'required',
            'perfil_id' => 'required',
            'secao_id' => 'required',
            'login' => 'required|string|max:255|unique:users',
            'nm_guerra' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'cargo_id' => $data['cargo_id'],
            'perfil_id' => $data['perfil_id'],
            'secao_id' => $data['secao_id'],
            'login' => $data['login'],
            'nm_guerra' => $data['nm_guerra'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //Para customizar o caminho da página de login
    public function showFormRegistro()
    {
        $cargos = Cargo::all();
        $secoes = Secao::all();
        return view('auth.register', compact('cargos', 'secoes'));
    }

}
