<?php

namespace Jp\YahooApis\YDN\V201911\FeedSet;

class FeedSetService extends \Jp\YahooApis\YDN\AdApiSample\Util\Service
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'SoapHeader' => 'Jp\\YahooApis\\YDN\\V201911\\SoapHeader',
      'SoapResponseHeader' => 'Jp\\YahooApis\\YDN\\V201911\\SoapResponseHeader',
      'Paging' => 'Jp\\YahooApis\\YDN\\V201911\\Paging',
      'Error' => 'Jp\\YahooApis\\YDN\\V201911\\Error',
      'ErrorDetail' => 'Jp\\YahooApis\\YDN\\V201911\\ErrorDetail',
      'Page' => 'Jp\\YahooApis\\YDN\\V201911\\Page',
      'ReturnValue' => 'Jp\\YahooApis\\YDN\\V201911\\ReturnValue',
      'ListReturnValue' => 'Jp\\YahooApis\\YDN\\V201911\\ListReturnValue',
      'FeedSetSelector' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSetSelector',
      'FeedSet' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSet',
      'ConditionSet' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\ConditionSet',
      'Condition' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\Condition',
      'FeedSetPage' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSetPage',
      'FeedSetValues' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSetValues',
      'FeedSetOperation' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSetOperation',
      'Operation' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\Operation',
      'FeedSetReturnValue' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\FeedSetReturnValue',
      'get' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\get',
      'getResponse' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\getResponse',
      'mutate' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\YDN\\V201911\\FeedSet\\mutateResponse',
    );

    /**
     * @param array $options A array of config values
     * @param string $endpoint Service Endpont URL
     * @param string $wsdl The wsdl file to use
     */
    public function __construct($wsdl = null, $endpoint = null, array $options = array())
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        $wsdl = 'https://location.im.yahooapis.jp/services/V201911/FeedSetService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
    }

    /**
     * @param get $parameters
     * @return getResponse
     */
    public function get(get $parameters)
    {
      return parent::invoke('get', $parameters);
    }

    /**
     * @param mutate $parameters
     * @return mutateResponse
     */
    public function mutate(mutate $parameters)
    {
      return parent::invoke('mutate', $parameters);
    }

}
