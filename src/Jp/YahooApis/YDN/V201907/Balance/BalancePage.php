<?php

namespace Jp\YahooApis\YDN\V201907\Balance;

class BalancePage extends \Jp\YahooApis\YDN\V201907\Page
{

    /**
     * @var BalanceValues $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BalanceValues
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param BalanceValues $values
     * @return \Jp\YahooApis\YDN\V201907\Balance\BalancePage
     */
    public function setValues($values)
    {
      $this->values = $values;
      return $this;
    }

}
