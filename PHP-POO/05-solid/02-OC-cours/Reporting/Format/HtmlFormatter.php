<?php

namespace Reporting\Format;

use Reporting\Report;

/**
 * Cette classe permet de formater un Report en HTML, elle ne devrait changer que si le formatage
 * lui même doit changer (ou que les données du Report ont changé évidemment)
 */
class HtmlFormatter implements FormatterInterface
{

    public function format(Report $report): string
    {
        // La fameuse méthode publique getContents() qui nous donne les infos qu'on veut 
        // sous la forme d'un tableau associatif (avec les clés title et date)
        $content = $report->getContents();

        // On peut maintenant formater !
        $title = $content['title'];
        $date = $content['date'];

        return "<h2>$title</h2><em>$date</em>";
    }

    public function deserialize(string $input): Report
    {
        return new Report('', '');
    }
}
