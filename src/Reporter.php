<?php

namespace src;

use Spatie\FlareClient\Report;

class Reporter
{
    /**
     * @param \Spatie\FlareClient\Report $report
     * @param $next
     *
     * @return mixed
     */
    public function handle(Report $report, $next): mixed
    {
        $context = $report->allContext();
        $context['session'] = null;
        $report->userProvidedContext($context);
        $error = $report->getStacktrace()->frames()[0];
        $fileName = str_replace(PATH . '/', '', $error->file);
        $error = $fileName . ':' . $error->lineNumber;
        $error = $report->getMessage() . '          ' . $error;
        logger()->error($error);

        return $next($report);
    }
}