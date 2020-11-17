<?php

namespace Reporting;

class Report
{
    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $title;

    /**
     * Constructeur qui reçoit la date et le titre du rapport
     *
     * @param string $date
     * @param string $title
     */
    public function __construct(string $date, string $title)
    {
        $this->date  = $date;
        $this->title = $title;
    }

    /**
     * Retourne un tableau associatif contenant la date et le titre du rapport
     * Indice : tiens tiens, on pourrait donc récupérer ces données depuis l'extérieur ?
     *
     * @return array
     */
    public function getContents(): array
    {
        return [
            'date'  => $this->date,
            'title' => $this->title
        ];
    }
}
