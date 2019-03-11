<?php

namespace Jp\YahooApis\YDN\V201903\Label;

class mutate
{

    /**
     * @var LabelOperation $operations
     */
    protected $operations = null;

    /**
     * @param LabelOperation $operations
     */
    public function __construct($operations)
    {
      $this->operations = $operations;
    }

    /**
     * @return LabelOperation
     */
    public function getOperations()
    {
      return $this->operations;
    }

    /**
     * @param LabelOperation $operations
     * @return \Jp\YahooApis\YDN\V201903\Label\mutate
     */
    public function setOperations($operations)
    {
      $this->operations = $operations;
      return $this;
    }

}
