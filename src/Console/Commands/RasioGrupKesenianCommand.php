<?php

namespace Bantenprov\RasioGrupKesenian\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RasioGrupKesenianCommand class.
 *
 * @package Bantenprov\RasioGrupKesenian
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGrupKesenianCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rasio-grup-kesenian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\RasioGrupKesenian package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\RasioGrupKesenian package');
    }
}
