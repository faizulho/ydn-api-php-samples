<?php

namespace Jp\YahooApis\YDN\V201911\FeedFtp;

class FeedFtpReturnValue extends \Jp\YahooApis\YDN\V201911\ListReturnValue
{

    /**
     * @var FeedFtpValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return FeedFtpValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param FeedFtpValues[] $values
     * @return \Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
