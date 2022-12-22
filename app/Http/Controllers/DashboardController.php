<?php

namespace App\Http\Controllers;

use App\Repositories\VeiculoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(VeiculoRepository $veiculoRepository)
    {
        $veiculos = $veiculoRepository->findBy([
            'user_id'   =>  Auth::id()
        ])->count();

        $manutencoes = [];

        return view('dashboard', compact('veiculos', 'manutencoes'));
    }
}
