<?php

namespace App\Http\Controllers;

use App\Contracts\VeiculoInterface;
use App\Http\Requests\VeiculoCreateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeiculoController extends Controller
{
    public function __construct(
        protected VeiculoInterface $repository
    ) {}

    public function index()
    {
        $veiculos = $this->repository->findBy([
            'user_id'   =>  1
        ]);

        return view('veiculo.index', compact('veiculos'));
    }

    public function adicionar()
    {
        return view('veiculo.formulario');
    }

    public function salvar(VeiculoCreateFormRequest $request)
    {
        $params = $request->all();
        $params['user_id']  = 1;
        unset($params['_token']);

        $store = $this->repository->store($params);

        if (! $store) {
            return $this->response(false, 'Ocorreu um erro ao salvar.', 3);
        }

        return $this->response(true, 'Veículo salvo com sucess.', 201);
    }

    public function editar(string $id)
    {
        $veiculo = $this->repository->find($id);

        return view('veiculo.formulario', compact('veiculo'));
    }

    public function excluir(string $id)
    {
        $this->repository->delete($id);

        return redirect()->route('veiculo.index');
    }
}
