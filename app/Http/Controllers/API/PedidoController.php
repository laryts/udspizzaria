<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Adicional;
use DB;

class PedidoController extends Controller
{
    public function index()
    {
        return new PedidoCollection(Pedido::all());
    }

    public function store(Request $request)
    {
        // dd($request);
        // exit;
        $pedido = new Pedido([
            'idTamanhos' => $request->get('idTamanho'),
            'idSabores' => $request->get('idSabor'), 
            'idUsers' => $request->get('idUser'), 
            'pdValor' => $request->get('pdValor'), 
            'pdTempo' => $request->get('pdTempo')
        ]);

        $pedido->save();

        $adicional = Adicional::find($request->get('adicional'));
        
        $pedido->adicionais()->attach($adicional);

        return response()->json('success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $pedido = Pedido::find($id);
      return response()->json($pedido);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->update($request->all());

        return response()->json('successfully updated');
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
      $pedido = Pedido::find($id);

      $pedido->delete();

      return response()->json('successfully deleted');
    }
    
    // Listando tamanhos
    public function showAll(){
        return Pedido::all();
    }

    public function find($id){
        return Pedido::find($id);
    }

    public function pedidoscomadicionais(){
        $pedidos = DB::table('pedidos')
        ->select('pedidos.idPedidos', 'tmDescricao', 'sbDescricao', 'adicionais.idAdicionais', 'adDescricao')
        ->join('tamanhos', 'tamanhos.idTamanhos', '=', 'pedidos.idTamanhos')
        ->join('sabores', 'sabores.idSabores', '=', 'pedidos.idSabores')
        ->leftJoin('adicionaisdospedidos', 'pedidos.idPedidos', '=', 'adicionaisdospedidos.idPedidos')
        ->leftJoin('adicionais', 'adicionaisdospedidos.idAdicionais', '=', 'adicionais.idAdicionais')
        ->get();

        foreach ($pedidos as $key => $value) {
            $pdadicionais[$value->idPedidos]['tamanho'] = $value->tmDescricao; 
            $pdadicionais[$value->idPedidos]['sabor'] = $value->sbDescricao; 
            $pdadicionais[$value->idPedidos]['adicionais'][$value->idAdicionais] = $value->adDescricao; 
        }
        return $pdadicionais;
        // dd($pdadicionais);

        // ->toSql();
    }

}
