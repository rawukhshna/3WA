<?php

namespace Reporting\Format;

use Reporting\Report;

class JsonFormatter
{


    /**
     * Retourne le rapport formatté en JSON
     *
     * @return string
     */
    public function formatToJSON(Report $report): string
    {
        $data = $report->getContents();
        return json_encode($data);
    }
}
