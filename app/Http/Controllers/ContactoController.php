<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    
    public function enviar(Request $request)
    {
        
        $dados = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::raw($dados['message'], function ($msg) use ($dados) {
            $msg->to('brainerpaulo45@gmail.com')
                ->subject('Novo feedback do SGASB')
                ->from($dados['email'], $dados['name']);
        });

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
