<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ROG extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Source SHOP - ROG';

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
        if ($this->confirm('Thao tac nay se xoa toan bo database cu va cai dat lai database moi , ban dong y chu ?')) {

            $this->call('migrate:fresh',[
                '--seed' => true,
            ]);

            $this->call('db:seed');

            $this->info('Cai Dat Thanh Cong !');

        }
    }
}
