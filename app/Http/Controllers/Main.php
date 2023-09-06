<?php

namespace App\Http\Controllers;

use App\Classes\Nossaclasse;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class Main extends Controller
{
    //=================================================================================

    public function index()
    {
        if($this->checkSession())
        {
            return redirect()->route('homeutente');  //home
        }
        else
        {
            return redirect()->route('login');
        }

    }

    //=================================================================================

    private function checkSession(){
        return session()->has('email');
    }


    //=================================================================================

    public function login(){

        //verifica se já existe sessão - usuário logado
        if($this->checkSession()){
            return redirect()->route('index');
        }

        //apresenta formulário de login
        $erro = session('erro');
        $data = [];

        if(!empty($erro)){
            $data = [
                'erro' => $erro 
            ];
        }

        return view('login', $data);
    }

    //=================================================================================
    
    public function login_submit(LoginRequest $request){

        //verifica se houve submissão de formulário
        if(!$request->isMethod('post')){
           return redirect()->route('index');     
        }

        //verifica se já existe sessão - usuário logado
        if($this->checkSession()){
            return redirect()->route('index');
        }

        // validação
        $request->validated();

        // verificar dados de login
        $email = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $email = Usuario::where('email', $email)->first();
        
        //verifica se existe o usuario
        if(!$email){

            session()->flash('erro', ['Não existe o usuário indicado.']);   //é possível acrescentar outros erros dentro do array
            return redirect()->route('login');

            /*
            usuário não existe
                a) registar um erro (usuário não existe)
                b) passar essa informação de forma a ser apresentada no form login
                c) voltar ao formulario de login
            */
           
        }

        //verificar se a senha está correta
        if(!Hash::check($senha, $email->senha)){
            session()->flash('erro', ['Senha inválida.']);   //é possível acrescentar outro erros dentro do array
            return redirect()->route('login');
        }
        
        //Criar sessão se login válido
        session()->put('email', $email);
        return redirect()->route('index');
        

    }

    public function logout(){

        session()->forget('email');
        return redirect()->route('index');

    }

    //=================================================================================
    // HOME (ENTRADA NA APLICAÇÃO)
    //=================================================================================

    public function home(){
        if(!$this->checkSession()){
           return redirect()->route('login');  
        }

        return view('home');
    }

    public function temp(){
        //inserir registo
        $usuario = new Usuario();
        $usuario -> usuario = "Samuel";
        $usuario -> email = "Samuel@gmail.com";
        $usuario -> senha = Hash::make("medico");
        $usuario -> save();

        echo "utilizado criado!";
    }
}
