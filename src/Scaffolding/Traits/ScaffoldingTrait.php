<?php

namespace Baezeta\Console\Scaffolding\Traits;

use Exception;
use Baezeta\Console\Scaffolding\Context\Constants\ScaffoldingConstanst;


trait ScaffoldingTrait
{
    public const BLUE = "\033[1;34m";

    public function blue()
    {
        return self::BLUE;
    }

    public function nombreFormateado(string $nombre): string
    {
        return palabraCapitalizada($nombre);
    }

    public function isFolder($name)
    {
        return is_dir($name);
    }

    public function formatearRutaCarpetas(string $rutaSrc, string $ruta): string
    {
        $esNecesarioFormateo = str_contains($ruta, "//");
        if ($esNecesarioFormateo) {
            $estrucuturaACrear = str_replace($rutaSrc . '//', " ", $ruta);
            $estrucuturaACrear = trim($estrucuturaACrear);
            return $estrucuturaACrear;
        }
        return $ruta;
    }

    public function crearDirectorio(string $path): bool
    {
        if (mkdir($path, 0755, true) === false) {
            $this->error('Error al crear la carpeta: ' . $path);
            return false;
        }
        return true;
    }

    public function crearSubDirectorios(string $path): bool
    {
        try {
            foreach (ScaffoldingConstanst::carpetas() as $value) {
                if (mkdir($path . '/' . $value, 0755, true) === false) {
                    $this->error('Error al crear la carpeta: ' . $path);
                    return false;
                }
            }
            return true;
        } catch (Exception $e) {
            $this->error('Error al crear la carpeta: ' . $path);
            return false;
        }
    }
}
