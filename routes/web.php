<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;
use App\Endereco;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cliente', function() {
    $cliente = Cliente::all();
    foreach($cliente as $c) {
        echo "ID: " . $c->id . "<br>";
        echo "Nome: " . $c->nome . "<br>";

        echo "Rua: " . $c->getendereco->rua . "<br>";
        echo "Bairro: " . $c->getendereco->bairro . "<br>";
        echo "Cidade: " . $c->getendereco->cidade . "<br>";

        echo "<hr>";
    }
});

Route::get('/inserir', function() {
    $c = new Cliente();
    $c->nome = "Leonardo Teste";
    $c->save();

    $e = new Endereco();
    $e->rua = "Victorio Santim";
    $e->numero = 123451;
    $e->cep = "123443";
    $e->uf = "SP";
    $e->cidade = "Sao Paulo";
    $e->bairro = "Itaquera";

    $c->getendereco()->save($e);

});


Route::get('/cliente/json', function () {
    //Lazy Loading
    //$cliente = Cliente::all();

    //Eager Loading 
    //Passa previamente quais relacionamentos vc deseja trazer junto com os clientes
    // Retorna antecipadamente
    $cliente = Cliente::with(['getendereco'])->get();
    return $cliente->toJson(); 


});

Route::get('/endereco/json', function () {
    //Lazy Loading
    //$e = Endereco::all();

    //Eager Loading 
    //Passa previamente quais relacionamentos vc deseja trazer junto com os clientes
    // Retorna antecipadamente
    $e = Endereco::with(['cliente'])->get();
    return $e->toJson(); 


});







