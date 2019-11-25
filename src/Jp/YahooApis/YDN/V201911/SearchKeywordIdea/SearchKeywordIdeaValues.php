<?php

namespace Jp\YahooApis\YDN\V201911\SearchKeywordIdea;

class SearchKeywordIdeaValues extends \Jp\YahooApis\YDN\V201911\ReturnValue
{

    /**
     * @var SearchKeywordIdea $searchKeywordIdea
     */
    protected $searchKeywordIdea = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return SearchKeywordIdea
     */
    public function getSearchKeywordIdea()
    {
      return $this->searchKeywordIdea;
    }

    /**
     * @param SearchKeywordIdea $searchKeywordIdea
     * @return \Jp\YahooApis\YDN\V201911\SearchKeywordIdea\SearchKeywordIdeaValues
     */
    public function setSearchKeywordIdea($searchKeywordIdea)
    {
      $this->searchKeywordIdea = $searchKeywordIdea;
      return $this;
    }

}
