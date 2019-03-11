<?php

namespace Jp\YahooApis\YDN\V201903\AdGroupTarget;

class OsTarget extends Target
{

    /**
     * @var DeviceOsType $osType
     */
    protected $osType = null;

    /**
     * @param TargetType $type
     */
    public function __construct($type)
    {
      parent::__construct($type);
    }

    /**
     * @return DeviceOsType
     */
    public function getOsType()
    {
      return $this->osType;
    }

    /**
     * @param DeviceOsType $osType
     * @return \Jp\YahooApis\YDN\V201903\AdGroupTarget\OsTarget
     */
    public function setOsType($osType)
    {
      $this->osType = $osType;
      return $this;
    }

}
