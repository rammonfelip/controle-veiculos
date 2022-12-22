<?php

namespace App\Providers;

use App\Contracts\ManutencaoInterface;
use App\Contracts\VeiculoInterface;
use App\Repositories\ManutencaoRepository;
use App\Repositories\VeiculoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VeiculoInterface::class, VeiculoRepository::class);
        $this->app->bind(ManutencaoInterface::class, ManutencaoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
