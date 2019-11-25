<?php

namespace Jp\YahooApis\YDN\V201911\Account;

class AccountService extends \Jp\YahooApis\YDN\AdApiSample\Util\Service
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
      'AccountSelector' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountSelector',
      'AccountPage' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountPage',
      'AccountOperation' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountOperation',
      'AccountReturnValue' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountReturnValue',
      'Account' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\Account',
      'AccountValues' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountValues',
      'AccountBudget' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\AccountBudget',
      'Operation' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\Operation',
      'get' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\get',
      'getResponse' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\getResponse',
      'mutate' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\mutate',
      'mutateResponse' => 'Jp\\YahooApis\\YDN\\V201911\\Account\\mutateResponse',
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
        $wsdl = 'https://location.im.yahooapis.jp/services/V201911/AccountService?wsdl';
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
