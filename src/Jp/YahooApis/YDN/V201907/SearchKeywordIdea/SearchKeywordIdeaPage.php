<?php

namespace Jp\YahooApis\YDN\V201907\SearchKeywordIdea;

class SearchKeywordIdeaPage extends \Jp\YahooApis\YDN\V201907\Page
{

    /**
     * @var SearchKeywordIdeaValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return SearchKeywordIdeaValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param SearchKeywordIdeaValues[] $values
     * @return \Jp\YahooApis\YDN\V201907\SearchKeywordIdea\SearchKeywordIdeaPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
