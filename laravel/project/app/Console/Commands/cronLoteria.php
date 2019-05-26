<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Interfaces\EventosAdapterInterface;

class cronLoteria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:finalizados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $finalizados;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EventosAdapterInterface $finalizados)
    {
        parent::__construct();
        $this->finalizados = $finalizados;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->finalizados->UpdateExistingPivot();
        echo "Hecho";
    }
}
