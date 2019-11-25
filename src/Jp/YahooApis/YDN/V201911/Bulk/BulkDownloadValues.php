<?php

namespace Jp\YahooApis\YDN\V201911\Bulk;

class BulkDownloadValues extends \Jp\YahooApis\YDN\V201911\ReturnValue
{

    /**
     * @var DownloadBulkJob $downloadBulkJob
     */
    protected $downloadBulkJob = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return DownloadBulkJob
     */
    public function getDownloadBulkJob()
    {
      return $this->downloadBulkJob;
    }

    /**
     * @param DownloadBulkJob $downloadBulkJob
     * @return \Jp\YahooApis\YDN\V201911\Bulk\BulkDownloadValues
     */
    public function setDownloadBulkJob($downloadBulkJob)
    {
      $this->downloadBulkJob = $downloadBulkJob;
      return $this;
    }

}
