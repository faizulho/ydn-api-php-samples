<?php

namespace Jp\YahooApis\YDN\V201903\ReportDefinition;

class ReportDefinitionValues extends \Jp\YahooApis\YDN\V201903\ReturnValue
{

    /**
     * @var ReportDefinition $reportDefinition
     */
    protected $reportDefinition = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ReportDefinition
     */
    public function getReportDefinition()
    {
      return $this->reportDefinition;
    }

    /**
     * @param ReportDefinition $reportDefinition
     * @return \Jp\YahooApis\YDN\V201903\ReportDefinition\ReportDefinitionValues
     */
    public function setReportDefinition($reportDefinition)
    {
      $this->reportDefinition = $reportDefinition;
      return $this;
    }

}
