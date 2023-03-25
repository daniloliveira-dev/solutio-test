<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Users;

class PrincipalController extends Controller
{
    public function index()
    {
        $buscarUsuarios = UserController::users();
        return view('site/main', compact('buscarUsuarios'));
    }

    public function novoUsuario()
    {
        return view('site/newUser');
    }

    public function edit($id)
    {
        $buscarUsuario = Users::where('id', $id)->get()->first();
        return view('site/edit', ['id' => $id])->with('buscarUsuario', $buscarUsuario);
    }

    public function logout()
    {
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {

            session_destroy();
            return redirect()->route('app.login');
        } else {

            return redirect()->route('app.login');
        }
    }
}
