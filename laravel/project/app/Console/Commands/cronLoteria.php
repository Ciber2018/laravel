<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\EventosInterface;
use App\Repositories\UserRepositoryInterface;

class cronLoteria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:finalizados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $eventos;
    protected $users;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EventosInterface $eventos, UserRepositoryInterface $users)
    {
        parent::__construct();
        $this->eventos = $eventos;
        $this->users = $users;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $finalizados = $this->eventos->eventosFinalizados();
        $usuarios = $this->users->allUsers();


    }
}
