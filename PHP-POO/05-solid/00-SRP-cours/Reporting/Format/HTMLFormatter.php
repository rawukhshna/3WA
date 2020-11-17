<?php

namespace Reporting\Format;

use Reporting\Report;

class HTMLFormatter
{
    /**
     * Retourne le rapport formatté en HTML
     *
     * @return string
     */
    public function formatToHTML(Report $report): string
    {
        $data = $report->getContents();
        return "<h2>{$data['title']}</h2><em>{$data['date']}</em>";
    }
}
