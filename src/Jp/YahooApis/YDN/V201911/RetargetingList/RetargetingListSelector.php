<?php

namespace Jp\YahooApis\YDN\V201911\RetargetingList;

class RetargetingListSelector
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $targetListIds
     */
    protected $targetListIds = null;

    /**
     * @var TargetListType[] $targetListTypes
     */
    protected $targetListTypes = null;

    /**
     * @var \Jp\YahooApis\YDN\V201911\Paging $paging
     */
    protected $paging = null;

    /**
     * @param int $accountId
     */
    public function __construct($accountId)
    {
      $this->accountId = $accountId;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\YDN\V201911\RetargetingList\RetargetingListSelector
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getTargetListIds()
    {
      return $this->targetListIds;
    }

    /**
     * @param long[] $targetListIds
     * @return \Jp\YahooApis\YDN\V201911\RetargetingList\RetargetingListSelector
     */
    public function setTargetListIds(array $targetListIds = null)
    {
      $this->targetListIds = $targetListIds;
      return $this;
    }

    /**
     * @return TargetListType[]
     */
    public function getTargetListTypes()
    {
      return $this->targetListTypes;
    }

    /**
     * @param TargetListType[] $targetListTypes
     * @return \Jp\YahooApis\YDN\V201911\RetargetingList\RetargetingListSelector
     */
    public function setTargetListTypes(array $targetListTypes = null)
    {
      $this->targetListTypes = $targetListTypes;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\YDN\V201911\Paging
     */
    public function getPaging()
    {
      return $this->paging;
    }

    /**
     * @param \Jp\YahooApis\YDN\V201911\Paging $paging
     * @return \Jp\YahooApis\YDN\V201911\RetargetingList\RetargetingListSelector
     */
    public function setPaging($paging)
    {
      $this->paging = $paging;
      return $this;
    }

}
