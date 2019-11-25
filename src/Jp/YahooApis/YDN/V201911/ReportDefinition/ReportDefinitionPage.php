<?php

namespace Jp\YahooApis\YDN\V201911\ReportDefinition;

class ReportDefinitionPage extends \Jp\YahooApis\YDN\V201911\Page
{

    /**
     * @var ReportDefinitionValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ReportDefinitionValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param ReportDefinitionValues[] $values
     * @return \Jp\YahooApis\YDN\V201911\ReportDefinition\ReportDefinitionPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
