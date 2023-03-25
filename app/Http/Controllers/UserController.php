<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function users()
    {
        $allUsers = Users::all();
        if ($allUsers) {

            return $allUsers;
        } else {

            return with('message', 'Não há nenhum usuário cadastrado');
        }
    }

    public function newUser(Request $request)
    {
        $rules = [
            'email' => 'email',
            'senha' => 'string|max:16'
        ];

        $message = [
            'email.email' => 'O campo :attribute deve ser um email',
            'senha.max' => 'O campo deve ter no máximo 16 caractéres'
        ];

        $request->validate($rules, $message);

        $verifyEmail = Users::where('email', $request->email)->get()->first();
        if ($verifyEmail) {

            return redirect()->route('view.novoUsuario')->with('info', 'O email inserido já existe, tente outro email');
        } else {

            $user = new Users();
            $user->email = $request->email;
            $user->password = $request->password;
            $user->password_code = md5($request->password);
            $save = $user->save();

            if ($save) {

                return redirect()->route('site.mainpage')->with('new-user', 'Usuário criado com sucesso.');
            } else {

                return redirect()->route('site.mainpage')->with('error-new-user', 'Houve um erro ao tentar criar novo usuário.');
            }
        }
    }

    public static function editUser(Request $request, $id)
    {
        $rules = [
            'email' => 'email',
            'senha' => 'string'
        ];

        $messages = [
            'email.email' => 'O campo :attribute deve ser um email válido',
        ];

        $request->validate($rules, $messages);

        $findUser = Users::where('id', $id)->get()->first();
        if ($findUser) {

            $verifyEmail = Users::where('email', $request->email)->get()->first();
            if (isset($verifyEmail->email) && $verifyEmail->email != $findUser->email) {
                if ($request->email == $verifyEmail->email) {

                    return redirect()->route('view.editar', ['id' => $id])->with('info', 'O email inserido já existe, por favor tente outro email');
                }
            } else {

                $findUser->email = $request->email;
                $findUser->password = $request->password;
                $findUser->password_code = md5($request->password);
                $update = $findUser->update();
                if ($update) {

                    return redirect()->route('site.mainpage')->with('updated', 'O usuário foi atualizado com sucesso.');
                } else {

                    return redirect()->route('site.mainpage')->with('error-updated', 'Houve um erro ao editar usuário, tente novamente');
                }
            }
        } else {

            return redirect()->route('site.mainpage')->with('not-found', 'Usuário não encontrado.');
        }
    }

    public function deleteUser($id)
    {
        $findUser = Users::where('id', $id)->get()->first();
        if ($findUser) {

            $deleteUser = $findUser->delete();
            if ($deleteUser) {

                return redirect()->route('site.mainpage')->with('deleted', 'Usuário deletado');
            } else {

                return redirect()->route('site.mainpage')->with('error-delete', 'Houve um erro ao deletar usuário');
            }
        } else {

            return redirect()->route('site.mainpage')->with('not-found', 'Houve um erro ao tentar deletar usuário.');
        }
    }
}
