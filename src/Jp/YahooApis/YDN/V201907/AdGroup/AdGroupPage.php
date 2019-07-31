<?php

namespace Jp\YahooApis\YDN\V201907\AdGroup;

class AdGroupPage extends \Jp\YahooApis\YDN\V201907\Page
{

    /**
     * @var AdGroupValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupValues[] $values
     * @return \Jp\YahooApis\YDN\V201907\AdGroup\AdGroupPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
