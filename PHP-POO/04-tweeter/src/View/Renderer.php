<?php

namespace Twitter\View;

class Renderer
{
    public function Display(string $name): string
    {
        //on ouvre un tampon mémoire
        ob_start();
        //l'affichage va se confiner dans le tampon mémoire
        require_once("pages/{$name}.html.php");
        //je prends je contenu du tampon mémoire
        $html = ob_get_clean();
        // et je le retourne
        return $html;
    }
}
