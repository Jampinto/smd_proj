<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtenteRequest;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\UtenteRequestUpdate;
use App\Mail\EmailSmd;
use App\Models\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Models\Utente;
use App\Models\Models\ConsultaMedica;

use function PHPUnit\Framework\isEmpty;

class UtenteController extends Controller
{
    public function home(){
        
        //inserir registo
        // $utente = new Utente();
        // $utente -> nome = "Manuel";
        // $utente -> morada = "Rua dos Andores";
        // $utente -> genero = "Masculino";
        // $utente -> email = "Manuel@gmail.com";
        // $utente -> nutente = 267591357;
        // $utente -> save();

        // update
        // $utente = Utente::find(3);
        // $utente ->nome = "André Franco";
        // $utente->save();
        // dd($utente);

        // delete
        // $utente = Utente::find(2);
        // $utente->delete();

        // $utentes = Utente::all();
        // // echo '<pre>';

        // dd($utentes);

        // $utentes = Utente::all();
        // $utentes = Utente::orderBy('created_at', 'desc')->get();


        $utentes = Utente::leftJoin('consultas', 'utentes.id', '=', 'consultas.id_utente')
            ->leftJoin('consultasmedicas', 'consultas.id', '=', 'consultasmedicas.id_consulta')
            ->select('utentes.*')
            ->orderByRaw('ISNULL(consultas.id) DESC, ISNULL(consultasmedicas.id) DESC, 
                consultasmedicas.created_at DESC, utentes.created_at DESC')
            ->get();

        return view('homeutente', ['utentes' => $utentes]);
    }


    public function novo_utente(){
        return view('novo_utente');
    }

    public function novo_utente_submit(UtenteRequest $request){
        
        $nome = $request->input('nome');
        $morada = $request->input('morada');
        $genero = $request->input('genero');
        $email = $request->input('email');
        $numero = $request->input('nutente');

        $utente = new Utente();
        $utente->nome = $nome;
        $utente->morada = $morada;
        $utente->genero = $genero;
        $utente->email = $email;
        $utente->nutente = $numero;

        $utente->save();

        return redirect()->route('homeutente');      
    }

    public function edit_utente($id){

        $utente = Utente::find($id);

        return view('edit_utente', ['utente' => $utente]);
    }

    public function edit_utente_submit(UtenteRequestUpdate $request){

        // get form inputs
        $id = $request->input("id_utente");
        $nome = $request->input('nome');
        $morada = $request->input('morada');
        $genero = $request->input('genero');
        $email = $request->input('email');
        $numero = $request->input('nutente');

        // update task
        $utente = Utente::find($id);
        $utente->nome = $nome;
        $utente->morada = $morada;
        $utente->genero = $genero;
        $utente->email = $email;
        $utente->nutente = $numero;

        $utente->save();
        
        //display tasks table
        return redirect()->route('homeutente');
    }
        
    public function delete_utente($id){

        $utente = Utente::find($id);

        if ($utente) {
            // Apagar todas as consultas médicas associadas às consultas do utente
            foreach ($utente->consultas as $consulta) {
            $consulta->consultas_medicas()->delete();
            }
            // Apaga todas as consultas associadas ao utente
            $utente->consultas()->delete();

            // Apaga o próprio utente
            $utente->delete();
            return redirect()->route('homeutente');
        }
    }

    public function registar_consulta($id){

        $utente = Utente::find($id); // Encontrar o utente pelo ID
        $consultas = $utente->consultas; // Obter as consultas associadas a este utente
        $consultasMedicas = [];

        if ($consultas->isNotEmpty()) {
            $temConsultasMedicas = false;

            foreach ($consultas as $consulta) {
                if ($consulta->consultas_medicas->isNotEmpty()) {
                    $temConsultasMedicas = true;
                    $consultasMedicas = $consulta->consultas_medicas;
                    break;
                }
            }

            if ($temConsultasMedicas) {
                // Se o utente tem consultas e consultas médicas, mostrar a visão 'consulta_medica'
                return view('consulta_medica', ['utente' => $utente, 'consultas' => $consultas, 'consultasMedicas' => $consultasMedicas]);
            } else {
                // Se o utente tem consultas, mas não tem consultas médicas, mostrar a visão 'ver_consulta'
                return view('ver_consulta', ['utente' => $utente, 'consultas' => $consultas]);
            }
        } else {
            // Se o utente não tem consultas nem consultas médicas, mostrar a visão 'registar_consulta'
            return view('registar_consulta', ['utente' => $utente]);
        }
    }

    public function registar_consulta_submit(Request $request){
        
        $id = $request->input("id_utente");
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $glicose = $request->input('glicose');
        $fumador = $request->input('fumador');
        $pad = $request->input('pad');
        $pas = $request->input('pas');
        $pressaoarterial = $request->input('pressaoarterial');

        $consulta = new Consulta();
        $consulta->id_utente = $id;
        $consulta->peso = $peso;
        $consulta->altura = $altura;
        $consulta->glicose = $glicose;
        $consulta->fumador = $fumador;
        $consulta->pad = $pad;
        $consulta->pas = $pas;
        $consulta->pressao_arterial = $pressaoarterial;

        $consulta->save();

        return redirect()->route('homeutente');
 
    }

    public function registar_medicina_submit(Request $request){
        
        $id = $request->input("id_consulta");
        $terapeutica = $request->input('terapeutica');
        $dosagem = $request->input('dosagem');
        $periodicidade = $request->input('periodicidade');
        $comentarios = $request->input('comentarios');     
        
        $consulta = new ConsultaMedica();
        $consulta->id_consulta = $id;
        $consulta->terapeutica = $terapeutica;
        $consulta->dosagem = $dosagem;
        $consulta->periodicidade = $periodicidade;
        $consulta->comentarios = $comentarios;
        
        $consulta->save();
        
        return redirect()->route('homeutente');
 
    }

    public function envioEmails($id){
        
        $utente = Utente::findOrFail($id);
  
        $consultas = $utente->consultas;
        $consultasMedicas = ConsultaMedica::whereIn('id_consulta', $consultas->pluck('id'))->get();
            
        Mail::to($utente->email)->send(new EmailSmd($utente, $consultas, $consultasMedicas));
                  
        return 'E-mail enviado com sucesso!';
    }

}


