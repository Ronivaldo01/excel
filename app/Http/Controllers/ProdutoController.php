<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Databases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produto;
class ProdutoController extends Controller
{

    public function import(){
        Produto::destroy('produtos');

        \Excel::load(Input::file('arquivo'),function($reader){
            $reader->each(function($sheet){
                foreach($sheet->toArray() as $row){

                    Produto::firstOrCreate($sheet->toArray());


                }
            });

        });
      //echo "Importação Completa!";
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Produto::all();
        return json_encode($prod);
        //return view('produtos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prods = Produto::find($id);
        if(isset($prods)){
            return view('editar',compact('prods'));
        }
        //return redirect('/editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->nome = $request->input('nome');
            $prod->quantidade = $request->input('quantidade');
            $prod->preco = $request->input('preco');
            $prod->save();
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = new Produto();
        $dados = $prod->find($id);
        if($dados){
            $dados->delete();
            return redirect('/');
        }


    }
}
