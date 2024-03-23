<?php

namespace Baezeta\Console\Scaffolding\Context\Commands;

use Illuminate\Console\Command;
use Baezeta\Console\Scaffolding\Traits\ScaffoldingTrait;

class SeleccionarContextos extends Command
{
    use ScaffoldingTrait;

    public const BLUE = "\033[1;34m";
    public const RED = "\033[0;31m";
    public const GREEN = "\033[0;32m";
    public const NO_COLOR = "\033[0m";

    public const EXIT_OPTION = 'SALIR';
    public const OK_OPTION = 'OK..!';
    public const CHARACTER = '##';

    protected $hidden = true;
    protected $signature = 'zeta:selecciona-crea-contexto';
    protected $description = 'Selecciona el Contexto desde los ya creados en ./src/...';
    protected $question = 'En que contexto desea crear la carpeta?';
    protected $questionFolder = 'Selecciona la carpeta donde quieras crear el scaffold';


    protected $src = '';
    protected $path = '';
    protected $contextoBase = 'src';


    public function handle()
    {
        // @phpstan-ignore-next-line
        $this->src = base_path() . '/' . $this->contextoBase;
        $this->path = $this->src;
        $this->question($this->question);

        return $this->mostrarOpciones();
    }

    public function mostrarOpciones($contextoElegido = null)
    {
        if (!$contextoElegido == null) {
            $this->info('Has seleccionado: ' . $contextoElegido);
        }

        $this->warn(self::BLUE . 'Estas en la carpeta: ' . self::BLUE . $this->contextoBase);
        $carpetas = $this->obtenerCarpetas($contextoElegido);

        $contextoElegido = (
            $this->components->choice(
                question: $this->questionFolder,
                choices: $carpetas,
                default: end($carpetas),
                multiple: false
            )
        );
        $this->line('');

        if ($contextoElegido == self::EXIT_OPTION) {
            $this->info('Has seleccionado Salir!');
            return Command::FAILURE;
        }
        if ($contextoElegido == self::OK_OPTION) {
            return $this->elegirNombreDelContexto();
        }

        if (str_contains($contextoElegido, self::CHARACTER)) {
            $this->warn('Has seleccionado una opcion equivocada!');
            return Command::FAILURE;
        }

        $this->contextoBase = $contextoElegido;
        $this->mostrarOpciones($contextoElegido);
    }
    private function elegirNombreDelContexto()
    {
        $this->info("Has seleccionado $this->contextoBase !");
        $question = self::BLUE . 'Escribe el nombre del contexto que deseas crear' . self::NO_COLOR;
        $nombre = $this->ask($question);
        $fullPath = $this->path . '/' . $nombre;

        $estrucuturaACrear = $this->formatearRutaCarpetas($this->src, $fullPath);
        $estructureFolderCommand = "zeta:contexto-carpetas";
        return $this->call($estructureFolderCommand, ['context' => $estrucuturaACrear]);
    }


    private function obtenerCarpetas($contexto = null)
    {
        $contexto = '/' . $contexto;
        $this->path .= $contexto;
        $src = $this->path;

        $carpetas = [];
        $folders = array_filter(glob($src . '/*'), 'is_dir');
        if (count($folders) > 0) {
            foreach ($folders as $folder) {
                $nombreDeCarpeta = explode("/", $folder);
                $nombreDeCarpeta = end($nombreDeCarpeta);

                $carpetas[] = $nombreDeCarpeta;
            }
        }

        array_push($carpetas, self::CHARACTER . ' Estas en la carpeta ./' .  $this->contextoBase . ' pulsa esta opcion para crear un nuevo contexto');
        array_push($carpetas, self::OK_OPTION);
        array_push($carpetas, self::EXIT_OPTION);

        return $carpetas;
    }
}
