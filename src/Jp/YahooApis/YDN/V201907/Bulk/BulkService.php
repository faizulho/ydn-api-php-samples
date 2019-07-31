<?php

namespace Jp\YahooApis\YDN\V201907\Bulk;

class BulkService extends \Jp\YahooApis\YDN\AdApiSample\Util\Service
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'SoapHeader' => 'Jp\\YahooApis\\YDN\\V201907\\SoapHeader',
      'SoapResponseHeader' => 'Jp\\YahooApis\\YDN\\V201907\\SoapResponseHeader',
      'Paging' => 'Jp\\YahooApis\\YDN\\V201907\\Paging',
      'Error' => 'Jp\\YahooApis\\YDN\\V201907\\Error',
      'ErrorDetail' => 'Jp\\YahooApis\\YDN\\V201907\\ErrorDetail',
      'Page' => 'Jp\\YahooApis\\YDN\\V201907\\Page',
      'ReturnValue' => 'Jp\\YahooApis\\YDN\\V201907\\ReturnValue',
      'ListReturnValue' => 'Jp\\YahooApis\\YDN\\V201907\\ListReturnValue',
      'BulkDownloadSelector' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkDownloadSelector',
      'DownloadBulkJob' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\DownloadBulkJob',
      'BulkDownloadReturnValue' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkDownloadReturnValue',
      'BulkDownloadValues' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkDownloadValues',
      'getBulkDownloadStatus' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkDownloadStatus',
      'BulkDownloadStatusSelector' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkDownloadStatusSelector',
      'BulkDownloadStatusPage' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkDownloadStatusPage',
      'UploadUrlValue' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\UploadUrlValue',
      'BulkUploadStatusSelector' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkUploadStatusSelector',
      'BulkUploadStatusPage' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkUploadStatusPage',
      'BulkUploadValues' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\BulkUploadValues',
      'UploadBulkJob' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\UploadBulkJob',
      'ProcessingItemsCount' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\ProcessingItemsCount',
      'getBulkDownload' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkDownload',
      'getBulkDownloadResponse' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkDownloadResponse',
      'getBulkDownloadStatusResponse' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkDownloadStatusResponse',
      'getUploadUrl' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getUploadUrl',
      'getUploadUrlResponse' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getUploadUrlResponse',
      'getBulkUploadStatus' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkUploadStatus',
      'getBulkUploadStatusResponse' => 'Jp\\YahooApis\\YDN\\V201907\\Bulk\\getBulkUploadStatusResponse',
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
        $wsdl = 'https://location.im.yahooapis.jp/services/V201907/BulkService?wsdl';
      }
      parent::__construct($wsdl, $endpoint, $options);
    }

    /**
     * @param getBulkDownload $parameters
     * @return getBulkDownloadResponse
     */
    public function getBulkDownload(getBulkDownload $parameters)
    {
      return parent::invoke('getBulkDownload', $parameters);
    }

    /**
     * @param getBulkDownloadStatus $parameters
     * @return getBulkDownloadStatusResponse
     */
    public function getBulkDownloadStatus(getBulkDownloadStatus $parameters)
    {
      return parent::invoke('getBulkDownloadStatus', $parameters);
    }

    /**
     * @param getUploadUrl $parameters
     * @return getUploadUrlResponse
     */
    public function getUploadUrl(getUploadUrl $parameters)
    {
      return parent::invoke('getUploadUrl', $parameters);
    }

    /**
     * @param getBulkUploadStatus $parameters
     * @return getBulkUploadStatusResponse
     */
    public function getBulkUploadStatus(getBulkUploadStatus $parameters)
    {
      return parent::invoke('getBulkUploadStatus', $parameters);
    }

}
