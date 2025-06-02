<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente; // ou Cliente, se for um modelo separado
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email',
            'telefones' => 'required|array|min:1',
            'telefones.*' => 'string|max:9',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $cliente = Cliente::create([
            'nome' => $validated['name'],
            'email' => $validated['email'],
            'senha' => Hash::make($validated['password']),
        ]);

        foreach ($validated['telefones'] as $tel) {
            $cliente->telefones()->create(['n_telefone' => $tel]);
        }

        Auth::guard('cliente')->login($cliente);
        return redirect()->route('cliente.dashboard');
        
    }
    public function mostrarFormLogin() {
        return view('pages.loginCliente');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
        ]);

        if (Auth::guard('cliente')->attempt($credentials)) {

            return redirect()->route('cliente.dashboard');
        }

        return back()->withErrors(['email' => 'Login inválido']);
    }
    public function destroy($id)
{
    // Encontrar o cliente pelo ID
    $cliente = Cliente::findOrFail($id);

    // Excluir o cliente do banco de dados
    $cliente->delete();

    // Retornar uma resposta ou redirecionar
    return redirect()->route('cliente.dashboard')
                     ->with('success', 'Cliente removido com sucesso!');
}
public function update(Request $request, $id)
    {
        // Validar os dados enviados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,' . $id, // Verifica se o email não está em uso por outro cliente, mas ignora o próprio cliente.
            'senha' => 'nullable|string|min:8|confirmed', // Senha opcional, mas se for fornecida, deve ser confirmada.
        ]);

        // Encontrar o cliente pelo ID
        $cliente = Cliente::findOrFail($id);

        // Atualizar os dados do cliente
        $cliente->nome = $validatedData['nome'];
        $cliente->email = $validatedData['email'];

        // Se uma nova senha for fornecida, atualiza a senha (se não, mantém a existente)
        if ($request->has('senha')) {
            $cliente->senha = bcrypt($validatedData['senha']);
        }

        // Salvar o cliente com os novos dados
        $cliente->save();

        // Retornar uma resposta ou redirecionar
        return redirect()->route('cliente.dashboard')
                         ->with('success', 'Dados atualizados com sucesso!');
    }
}
