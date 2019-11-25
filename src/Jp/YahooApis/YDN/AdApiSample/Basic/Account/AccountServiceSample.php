<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\YDN\AdApiSample\Basic\Account;

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\YDN\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\YDN\V201911\Account\{Account,
    AccountOperation,
    AccountSelector,
    AccountService,
    AccountStatus,
    AccountType,
    AutoTaggingEnabled,
    DeliveryStatus,
    get,
    getResponse,
    mutate,
    mutateResponse,
    Operator};
use Jp\YahooApis\YDN\V201911\Paging;

/**
 * example AccountService operation and Utility method collection.
 */
class AccountServiceSample
{

    const SERVICE_NAME = 'AccountService';

    /**
     * @var AccountService
     */
    private static $service = null;

    /**
     * AccountServiceSample constructor.
     */
    private static function init()
    {
        // get ServiceInterface
        self::$service = self::$service ?? SoapUtils::getService(AccountService::class);
    }

    /**
     * example get accounts.
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
     * example mutate accounts.
     *
     * @param mutate $request
     * @return mutateResponse
     * @throws Exception
     */
    public static function mutate(mutate $request): mutateResponse
    {
        self::init();

        // Call API
        $response = self::$service->mutate($request);

        // Error
        if (!is_null($response->getError())) {
            throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        }

        // Response
        if (is_null($response->getRval()->getValues())) {
            throw new Exception('No response of ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
        } else {

            // Error
            foreach ($response->getRval()->getValues() as $values) {
                if (!is_null($values->getError())) {
                    throw new Exception('Fail to ' . self::SERVICE_NAME . '/' . (string)$request->getOperations()->getOperator() . '.' . PHP_EOL);
                }
            }
        }

        return $response;
    }

    /**
     * example AccountService operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setting
        // =================================================================
        $accountId = SoapUtils::getAccountId();

        try {
            // =================================================================
            // AccountService GET
            // =================================================================
            // create request.
            $selector = new AccountSelector();
            $selector->setAccountTypes([
                AccountType::INVOICE,
                AccountType::PREPAY,
            ]);
            $selector->setAccountStatuses([
                AccountStatus::SERVING,
                AccountStatus::ENDED,
            ]);
            $paging = new Paging(1, 20);
            $selector->setPaging($paging);

            $getRequest = new get($selector);

            // run
            self::get($getRequest);

            // =================================================================
            // AccountService SET
            // =================================================================
            // create request.
            $account = new Account();
            $account->setAccountId($accountId);
            $account->setAccountName('SampleAccount_UpdatedOn_' . SoapUtils::getCurrentTimestamp());
            $account->setDeliveryStatus(DeliveryStatus::PAUSED);
            $account->setAutoTaggingEnabled(AutoTaggingEnabled::TRUE);

            $operation = new AccountOperation(Operator::SET, $account);
            $setRequest = new mutate($operation);

            // run
            self::mutate($setRequest);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    AccountServiceSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
