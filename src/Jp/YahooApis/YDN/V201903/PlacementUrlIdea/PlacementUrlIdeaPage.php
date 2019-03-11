<?php

namespace Jp\YahooApis\YDN\V201903\PlacementUrlIdea;

class PlacementUrlIdeaPage extends \Jp\YahooApis\YDN\V201903\Page
{

    /**
     * @var PlacementUrlIdeaValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PlacementUrlIdeaValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param PlacementUrlIdeaValues[] $values
     * @return \Jp\YahooApis\YDN\V201903\PlacementUrlIdea\PlacementUrlIdeaPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
