<?php

namespace Jp\YahooApis\YDN\V201903\FeedFtp;

class FeedFtpPage extends \Jp\YahooApis\YDN\V201903\Page
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
     * @return \Jp\YahooApis\YDN\V201903\FeedFtp\FeedFtpPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
