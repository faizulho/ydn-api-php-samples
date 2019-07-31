<?php

namespace Jp\YahooApis\YDN\V201907\AdGroupTarget;

class AdGroupTargetValue extends \Jp\YahooApis\YDN\V201907\ReturnValue
{

    /**
     * @var AdGroupTarget $adGroupTargetList
     */
    protected $adGroupTargetList = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupTarget
     */
    public function getAdGroupTargetList()
    {
      return $this->adGroupTargetList;
    }

    /**
     * @param AdGroupTarget $adGroupTargetList
     * @return \Jp\YahooApis\YDN\V201907\AdGroupTarget\AdGroupTargetValue
     */
    public function setAdGroupTargetList($adGroupTargetList)
    {
      $this->adGroupTargetList = $adGroupTargetList;
      return $this;
    }

}
