<?php

namespace Jp\YahooApis\YDN\V201911\RetargetingTag;

class RetargetingTagReturnValue extends \Jp\YahooApis\YDN\V201911\ListReturnValue
{

    /**
     * @var RetargetingTagValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return RetargetingTagValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param RetargetingTagValues[] $values
     * @return \Jp\YahooApis\YDN\V201911\RetargetingTag\RetargetingTagReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
