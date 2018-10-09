<?php


namespace Leon0399\Laravel\FactoryCLI\Console;


use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class FactoryCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factory:create 
                                {class : The class you wish to create}
                                {--a|amount=1 : Amount of models you wish to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a collection of models and persist them to the database';

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
     * @throws \Exception
     */
    public function handle()
    {
        $class = $this->argument('class');
        $amount = (int)$this->option('amount');

        $class = str_replace('/', '\\', $class);

        if (!class_exists($class)) {
            if (class_exists('App\\' . $class)) {
                $class = 'App\\' . $class;
            } else {
                throw new \InvalidArgumentException("Class {$class} not exists");
            }
        }

        $headers = [];
        if (is_subclass_of($class, Model::class)) {
            $headers[] = (new $class())->getKeyName();
        }

        $this->line("Creating {$amount} instances of class {$class}");

        $classes = factory($class, $amount)->create();

        if (!empty($headers)) {
            $this->table($headers, collect($classes)->map(function ($model) use ($headers) {
                return collect($model)->only($headers);
            }));
        }
    }

}