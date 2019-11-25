<?php

namespace Jp\YahooApis\YDN\V201911\RetargetingTag;

abstract class Operation
{

    /**
     * @var Operator $operator
     */
    protected $operator = null;

    /**
     * @param Operator $operator
     */
    public function __construct($operator)
    {
      $this->operator = $operator;
    }

    /**
     * @return Operator
     */
    public function getOperator()
    {
      return $this->operator;
    }

    /**
     * @param Operator $operator
     * @return \Jp\YahooApis\YDN\V201911\RetargetingTag\Operation
     */
    public function setOperator($operator)
    {
      $this->operator = $operator;
      return $this;
    }

}
