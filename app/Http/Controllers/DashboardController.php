<?php

namespace App\Http\Controllers;

use App\Repositories\VeiculoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function dashboard(VeiculoRepository $veiculoRepository)
    {
        $userId = Auth::id();

        $veiculos = $veiculoRepository->findBy([
            'user_id'   =>  $userId
        ])->count();

        $request = Request::create(env('APP_URL') . sprintf('/api/v1/%s/manutencoes', $userId), 'GET');
        $manutencoes = json_decode(Route::dispatch($request)->getContent())->data;

        return view('dashboard', compact('veiculos', 'manutencoes'));
    }
}
