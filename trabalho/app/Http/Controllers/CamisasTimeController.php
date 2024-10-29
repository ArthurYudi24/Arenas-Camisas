<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camisas;


class CamisasTimeController extends Controller
{
    public function index(){
        $camisas = Camisas::where("vendido", "0")->get();
        return view("home.index", compact("camisas"));

    }

    public function indexAdm(){
        $camisas = Camisas::where("vendido", "0")->get();
        return view("camisas.index", compact("camisas"));

    }

    public function IncluirCamisa(Request $request) 
    {
        //$_POST['cat_nome']
        $nome = $request->input("nome");
        $tamanho = $request->input("tamanho");
        $marca = $request->input("marca");
        $valor = $request->input("valor");
        $url_imagem = $request->input("url_imagem");

        $nova = new Camisas;
        $nova->nome = $nome;
        $nova->tamanho = $tamanho;
        $nova->marca = $marca;
        $nova->valor = $valor;
        $nova->url_imagem = $url_imagem;
        $nova->vendido = 0;
        $nova->save();

        return redirect('/admCamisas');

        //INSERT INTO categoria (id, cat_nome, cat_descricao)
        // VALUES ( ???, 'VALOR', 'DESCRICAO')
    }

    public function ExcluirCamisa($id)
    {
        //SELECT * FROM categoria WHERE id = ID        
        $cam = Camisas::where("id", $id)->first();
        $cam->vendido = 1;
        $cam->save();

        return redirect('/admCamisas');

        //UPDATE categoria SE cat_Ativo = 0 WHERE id=id

    }                                                                                                   

    public function BuscarAlteracao($id) 
    {
        $camisas = Camisas::where("id", $id)->first();

        return view('camisas.alterar', compact('camisas'));
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("nome");
        $dado_tamanho = $request->input("tamanho");
        $dado_marca = $request->input("marca");
        $dado_valor = $request->input("valor");
        $dado_url_imagem = $request->input("url_imagem");
        $dado_id = $request->input('id');

        $camisas = Camisas::where("id", $dado_id)->first();
        $camisas->nome = $dado_nome;
        $camisas->tamanho = $dado_tamanho;
        $camisas->marca = $dado_marca;
        $camisas->valor = $dado_valor;
        $camisas->url_imagem = $dado_url_imagem;
        $camisas->save();

        return redirect('/admCamisas');
    }
}

