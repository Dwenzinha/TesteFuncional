<?php

namespace App\Http\Controllers;

use App\Models\Models\Conta as Conta;
use App\Http\Resources\Conta as ContaResource;
use Illuminate\Http\Request;


class ContaController extends Controller
{

    private $retorno = ['erro' => '', 'result' => []];

    public function all()
    {
        $contas = Conta::pagin(10);
        return ContaResource::collection($contas);
    }

    public function show(Conta $conta)
    {
        //   $conta=Conta::table('contas')->where('conta', $conta);
        //  return new ContaResource($conta);
        return response(['conta' => new ContaResource($conta), 'message' => 'OK'], 200);
    }

    public function saldoConta($numeroConta)
    {
        $conta = Conta::where('conta', $numeroConta)->first();

        if ($conta) {
            $this->array['result'] = $conta;
        } else {
            $this->array['erro'] = 'Conta não existe';
        }

        return $this->array;
    }

    public function saqueConta(Request $request)
    {
        $numeroConta = $request->input('conta');
        $valorSaque = $request->input('valor');

        if ($numeroConta && $valorSaque) {

            $contaAtual = Conta::where('conta', $numeroConta)->first();

            if ($valorSaque <= $contaAtual->saldo) {
                $contaAtual->saldo -= $valorSaque;
                $contaAtual->save();

                $this->array['result'] = [
                    'saldo' => "$contaAtual->saldo"
                ];
            } else {
                $this->array['erro'] = 'Saldo insuficiente';
            }
        } else {
            $this->array['erro'] = 'Conta e valor são informações obrigatórias';
        }
        return $this->array;
    }


    public function depositoConta(Request $request)
    {
        $numeroConta = $request->input('conta');
        $valorDeposito = $request->input('valor');

        if ($numeroConta && $valorDeposito) {

            $contaAtual = Conta::where('conta', $numeroConta)->first();
            $contaAtual->saldo += $valorDeposito;
            $contaAtual->save();

            $this->array['result'] = [
                'saldo' => "$contaAtual->saldo"
            ];

        } else {
            $this->array['erro'] = 'Conta e valor são informações obrigatórias';
        }
        return $this->array;
    }
}
