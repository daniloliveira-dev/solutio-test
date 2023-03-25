<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        return view('app/login');
    }

    public function auth(Request $request)
    {
        $rules = [
            'email' => 'email',
            'password' => 'required'
        ];

        $message = [
            'email.email' => 'O campo email deve ser um email',
            'password.required' => 'O campo senha é um campo obrigatório'
        ];

        $request->validate($rules, $message);

        $validateUser = Users::where('email', $request->email)->where('password', $request->password)->get()->first();
        if (isset($validateUser->password) && md5($validateUser->password) == $validateUser->password_code) {

            session_start();
            $_SESSION['email'] = $validateUser->email;
            
            return redirect()->route('site.mainpage');
        } else {

            $verifyEmail = Users::where('email', $request->email)->get()->first();
            if ($verifyEmail) {

                return redirect()->route('app.login')->with('info', 'Este email já foi registrado, tente utilizar um novo');
            } else {

                $user = new Users;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->password_code = md5($request->password);
                $salvar = $user->save();
                if ($salvar) {

                    return redirect()->route('app.login')->with('message', 'Novo usuário foi criado com este email.');
                } else {

                    return redirect()->route('app.login')->with('info', 'O usuário não foi cadastrado, tente novamente.');
                }
            }
        }
    }
}
