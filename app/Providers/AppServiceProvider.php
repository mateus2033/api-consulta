<?php

namespace App\Providers;

use App\Interfaces\IRepositories\Base\IDBTransaction;
use App\Interfaces\IRepositories\Cidade\ICidadeRepository;
use App\Interfaces\IRepositories\Consulta\IConsultaRepository;
use App\Interfaces\IRepositories\Medico\IMedicoRepository;
use App\Interfaces\IRepositories\Paciente\IPacienteRepository;
use App\Interfaces\IRepositories\User\IUserRepository;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Cidade\CidadeRepository;
use App\Repositories\Consulta\ConsultaRepository;
use App\Repositories\Medico\MedicoRepository;
use App\Repositories\Paciente\PacienteRepository;
use App\Repositories\User\UserRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICidadeRepository::class, CidadeRepository::class);
        $this->app->bind(IConsultaRepository::class, ConsultaRepository::class);
        $this->app->bind(IMedicoRepository::class, MedicoRepository::class);
        $this->app->bind(IPacienteRepository::class, PacienteRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IDBTransaction::class, DBTransaction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
