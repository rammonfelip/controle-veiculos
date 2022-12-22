<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ManutencaoResource;
use App\Repositories\ManutencaoRepository;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function manutencoes($userId, ManutencaoRepository $repository)
    {
        $inicio = Carbon::now()->startOfDay()->format('Y-m-d');
        $fim    =  Carbon::now()->addDays(7)->endOfDay()->format('Y-m-d');

        $manutencoes = $repository->findByUser($userId)
            ->whereBetween('agendamento', [$inicio, $fim]);

        return ManutencaoResource::collection($manutencoes);
    }
}
