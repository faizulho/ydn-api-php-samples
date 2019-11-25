<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\YDN\AdApiSample\Basic\PlacementUrlIdea;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\YDN\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\YDN\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\YDN\V201911\PlacementUrlIdea\{AdFormatConditions, PlacementUrlIdeaSelector, PlacementUrlIdeaService, get, getResponse};
use Jp\YahooApis\YDN\V201911\Paging;

/**
 * example PlacementUrlIdeaService operation and Utility method collection.
 */
class PlacementUrlIdeaServiceSample
{

    const SERVICE_NAME = 'PlacementUrlIdeaService';

    /**
     * @var PlacementUrlIdeaService
     */
    private static $service = null;

    /**
     * PlacementUrlIdeaServiceSample constructor.
     */
    public static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(PlacementUrlIdeaService::class);
    }

    /**
     * example get placementUrlIdea.
     *
     * @param get $request
     * @return getResponse
     * @throws Exception
     */
    public static function get(get $request): getResponse
    {
        self::init();

        // Call API
        $response = self::$service->get($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/get.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example PlacementUrlIdeaService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        try {
            // =================================================================
            // PlacementUrlIdeaService GET
            // =================================================================
            // create request.
            $getRequest = self::buildExampleGetRequest();

            // run
            self::get($getRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }

    /**
     * example get request.
     *
     * @return get
     */
    public static function buildExampleGetRequest(): get
    {
        $selector = new PlacementUrlIdeaSelector();
        $selector->setKeyword('');
        $selector->setSiteCategories(['TC-SC-10110100100100']);

        $adFormat = new AdFormatConditions();
        $adFormat->setAdStyle('IMAGE');
        $adFormat->setMediaAdFormat('SQUARE_300');
        $selector->setAdFormats([$adFormat]);

        $paging = new Paging(1, 20);
        $selector->setPaging($paging);
        return new get($selector);
    }

    /**
     * create PlacementUrlIdeaValuesList.
     *
     * @return ValuesHolder
     * @throws Exception
     */
    public static function create(): ValuesHolder
    {
        $request = self::buildExampleGetRequest();
        $response = self::get($request);

        $selfValuesHolder = new ValuesHolder();
        $selfValuesHolder->setPlacementUrlIdeaValuesList($response->getRval()->getValues());
        return $selfValuesHolder;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    PlacementUrlIdeaServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}

