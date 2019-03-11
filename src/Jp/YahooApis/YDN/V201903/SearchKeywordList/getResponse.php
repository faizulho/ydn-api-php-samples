<?php

namespace Jp\YahooApis\YDN\V201903\SearchKeywordList;

class getResponse
{

    /**
     * @var SearchKeywordListPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\YDN\V201903\Error $error
     */
    protected $error = null;

    /**
     * @param SearchKeywordListPage $rval
     * @param \Jp\YahooApis\YDN\V201903\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return SearchKeywordListPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param SearchKeywordListPage $rval
     * @return \Jp\YahooApis\YDN\V201903\SearchKeywordList\getResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\YDN\V201903\Error
     */
    public function getError()
    {
      return $this->error;
    }

    /**
     * @param \Jp\YahooApis\YDN\V201903\Error $error
     * @return \Jp\YahooApis\YDN\V201903\SearchKeywordList\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
