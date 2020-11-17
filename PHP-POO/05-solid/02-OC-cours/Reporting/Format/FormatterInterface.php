<?php

namespace Reporting\Format;

use Reporting\Report;

Interface FormatterInterface {

    public function format(Report $report) :string;
    
}