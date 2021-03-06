<?php

use Illuminate\Console\Command;

class GetCurrentGitHashCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'getgithash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This returns current (short) Git hash.';

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
    public function fire()
    {
        GitHashHelper::currentDeployedHash();
    }
}
