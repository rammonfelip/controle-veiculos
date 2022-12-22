<?php

namespace App\Http\Controllers;

use App\Contracts\ManutencaoInterface;
use App\Contracts\VeiculoInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ManutencaoController extends Controller
{
    public function __construct(
        protected ManutencaoInterface $repository
    ) {}

    public function index()
    {
        $manutencoes = $this->repository->findByUser(Auth::id());

        return view('manutencao.index', compact('manutencoes'));
    }

    public function adicionar(VeiculoInterface $veiculoRepository)
    {
        $veiculos = $veiculoRepository->findBy([
            'user_id'   =>  Auth::id()
        ]);

        return view('manutencao.formulario', compact('veiculos'));
    }

    public function salvar(Request $request)
    {
        $params = [
            'id'            =>  $request->input('id'),
            'veiculo_id'    =>  $request->input('veiculo_id'),
            'agendamento'   =>  Carbon::createFromFormat('d/m/Y', $request->input('agendamento'))->format('Y-m-d'),
            'descricao'     =>  $request->input('descricao'),
            'realizado'     =>  $request->input('realizado') ? true : false,
            'data_realizado'   => $request->input('data_realizado') ? Carbon::createFromFormat('d/m/Y', $request->input('data_realizado'))->format('Y-m-d') : null,
        ];

        $this->repository->store($params);

        return Redirect::route('manutencao.index');
    }

    public function editar(string $id, VeiculoInterface $veiculoRepository)
    {
        $manutencao = $this->repository->find($id);
        $veiculos = $veiculoRepository->findBy([
            'user_id'   =>  Auth::id()
        ]);

        return view('manutencao.formulario', compact('manutencao', 'veiculos'));
    }

    public function excluir(string $id)
    {
        $this->repository->delete($id);

        return Redirect::route('manutencao.index');
    }
}
