<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;

class TestController extends Controller
{
    private $login;
    private $user;

    public function getLogin()
    {
        $data = [
            'email' => 'talbas@gmx.com',
            'password' => 123456,
        ];

        // Do login
        if (Auth::attempt($data) and !$this->login):
            $this->login = true;
            $this->user = Auth::user();

            return "User ID {$this->user->id} ({$this->user->name}) logado com sucesso!<br>Email: {$this->user->email}";
        endif;

        // Check if user is logged in
        if (Auth::check()):
            return $this->login ? 'Logado' : 'Não logado';
        endif;

        // Fallback if none of them could be done
        return "Falhou!";

    }

    public function getLogout()
    {
        Auth::logout();

        $this->login = false;
        $this->user = null;

        return "Volte a qualquer momento";
    }


}
