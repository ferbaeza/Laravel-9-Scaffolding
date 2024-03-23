<?php

namespace Baezeta\Console\Scaffolding\Context;


use Illuminate\Console\Command;
use Baezeta\Console\Scaffolding\Traits\ScaffoldingTrait;


class CreateScaffoldind extends Command
{
    use ScaffoldingTrait;

    public const BLUE = "\033[1;34m";
    public const NO_COLOR = "\033[0m";
    public const GREENLIGHT = "\033[1;32m";


    protected $hidden = false;
    protected $signature = 'zeta:crear-contexto {context?}';
    protected $description = self::BLUE . 'Comando para crear un nuevo' . self::GREENLIGHT . ' contexto' . self::BLUE . ' en la estructura de carpetas de la aplicación' . self::NO_COLOR;


    protected $isFullContext = false;
    protected array $separadores = ["\\", "/", ".", " ", "_", "-"];

    public function handle()
    {
        $context = $this->argument('context');
        $expectedResponse = false;

        if (($context == null)) {
            $estructureCommand = 'zeta:selecciona-crea-contexto';
            $expectedResponse = $this->call($estructureCommand);
        } else {
            $context = $this->nombreFormateado($context);
            $estructureFolderCommand = 'zeta:contexto-carpetas';
            $expectedResponse = $this->call($estructureFolderCommand, ['context' => $context]);
        }
        if ($expectedResponse == Command::SUCCESS) {
            $this->info('Done!');
            return Command::SUCCESS;
        }
        return Command::FAILURE;
    }
}
