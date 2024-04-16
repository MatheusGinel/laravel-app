<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscalaController extends Controller
{
    private $clientes = [
        ['id' => 1, 'nome' => 'ademir',],
        ['id' => 2, 'nome' => 'joão',],
        ['id' => 3, 'nome' => 'maria',],
        ['id' => 4, 'nome' => 'aline',]
    ];

    public function  __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes)) {
          session(['clientes' => $this->clientes]);
        }
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
       $id = count($clientes) + 1;
       $nome = $request->nome;
       $dados = ['id' => $id , "nome" => $nome];
   $clientes[] = $dados;
   session(['clientes' => $clientes]);

   return redirect()->route('clientes.index');

       /*$clientes = session('clientes');
       $id = count($clientes) + 1;
       $nome = $request->nome;
       $dados = ['id' => $id , "nome" => $nome];
       $clientes[] = $dados;
       session(['clientes' => $clientes]);

       return redirect()->route('clientes.index');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clientes = session('clientes');
    $ids = array_column($clientes, 'id');
    $index = array_search($id, $ids);
    $cliente = $clientes[$index];
    return view('clientes.info', compact('cliente'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        $cliente = $clientes[$index];
        return view('clientes/edit', compact('cliente'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientes = session('clientes');
        $nome = $request->nome;
        $dados = ['id' => $id , "nome" => $nome];
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
    $clientes[$index] = $dados;
    session(['clientes' => $clientes]);

   return redirect()->route('clientes.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        array_splice($clientes, $index,1);
        session(['clientes' => $clientes]);

    return redirect()->route('clientes.index');

    }
}
