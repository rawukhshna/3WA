<?php

namespace Reporting;

use Reporting\Format\FormatterInterface;
use Reporting\Format\JsonFormatter;
use Reporting\Format\HtmlFormatter;

class ReportExtractor
{
    /**
     * Le tableau qui contiendra les différents formatters
     *
     * @var array
     */
    protected $formatters = [];

    /**
     * Permet d'ajouter un formatter au tableau formatters
     *
     * @param FormatterInterface $Formatter
     * @return void
     */
    public function addFormatter(FormatterInterface $Formatter): void
    {
        $this->formatters[] = $Formatter;
    }

    /**
     * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
     * des formatters ajoutés dans le tableau
     *
     * @param Report $report
     *
     * @return void
     */
    public function process(Report $report): void
    {
        // Pour chaque formatter dans le tableau
        foreach ($this->formatters as $formatter) {

            echo $formatter->format($report);

            echo "<hr/>";
        }

        // Voilà une méthode que je vais devoir modifier à chaque fois qu'on voudra créer un nouveau type
        // de format à ce projet ... pas très Open/Closed ;-)
    }
}
