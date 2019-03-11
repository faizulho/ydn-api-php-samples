<?php

namespace Jp\YahooApis\YDN\V201903\Video;

class UploadUrlPage extends \Jp\YahooApis\YDN\V201903\Page
{

    /**
     * @var UploadUrlValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return UploadUrlValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param UploadUrlValues[] $values
     * @return \Jp\YahooApis\YDN\V201903\Video\UploadUrlPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
