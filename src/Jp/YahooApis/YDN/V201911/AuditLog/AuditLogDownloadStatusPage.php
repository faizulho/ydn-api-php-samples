<?php

namespace Jp\YahooApis\YDN\V201911\AuditLog;

class AuditLogDownloadStatusPage extends \Jp\YahooApis\YDN\V201911\Page
{

    /**
     * @var AuditLogDownloadValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AuditLogDownloadValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AuditLogDownloadValues[] $values
     * @return \Jp\YahooApis\YDN\V201911\AuditLog\AuditLogDownloadStatusPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
