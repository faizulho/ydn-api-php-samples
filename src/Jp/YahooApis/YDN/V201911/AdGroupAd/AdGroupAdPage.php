<?php

namespace Jp\YahooApis\YDN\V201911\AdGroupAd;

class AdGroupAdPage extends \Jp\YahooApis\YDN\V201911\Page
{

    /**
     * @var AdGroupAdValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupAdValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupAdValues[] $values
     * @return \Jp\YahooApis\YDN\V201911\AdGroupAd\AdGroupAdPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
