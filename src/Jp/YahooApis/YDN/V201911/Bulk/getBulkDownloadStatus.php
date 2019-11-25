<?php

namespace Jp\YahooApis\YDN\V201911\Bulk;

class getBulkDownloadStatus
{

    /**
     * @var BulkDownloadStatusSelector $selector
     */
    protected $selector = null;

    /**
     * @param BulkDownloadStatusSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return BulkDownloadStatusSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param BulkDownloadStatusSelector $selector
     * @return \Jp\YahooApis\YDN\V201911\Bulk\getBulkDownloadStatus
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
