<?php

namespace Jp\YahooApis\YDN\V201911\FeedItem;

class FeedItemService extends \Jp\YahooApis\YDN\AdApiSample\Util\Service
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
      'FeedItemValues' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\FeedItemValues',
      'FeedItem' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\FeedItem',
      'FeedItemOperation' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\FeedItemOperation',
      'FeedItemReturnValue' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\FeedItemReturnValue',
      'Operation' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\Operation',
      'mutate' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\YDN\\V201911\\FeedItem\\mutateResponse',
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
        $wsdl = 'https://ydn.yahooapis.jp/services/V201911/FeedItemService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
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
