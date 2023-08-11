<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    #Retornando as informações do usuário
    public function show_user($id)
    {
        $user = User::findOrFail($id);

        #Condição que verifica se o usuario que está acessando a view  tem o mesmo ID do usuario autenticado
        if (Gate::allows('view', $user)) {
            return view('user.usuario', ['user' => $user]);
        }

        abort(403); // Acesso não autorizado
    }
}
