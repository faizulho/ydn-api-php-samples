<?php

namespace Jp\YahooApis\YDN\V201903\AccountAdProduct;

class AccountAdProductPage extends \Jp\YahooApis\YDN\V201903\Page
{

    /**
     * @var AccountAdProductValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AccountAdProductValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AccountAdProductValues[] $values
     * @return \Jp\YahooApis\YDN\V201903\AccountAdProduct\AccountAdProductPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
