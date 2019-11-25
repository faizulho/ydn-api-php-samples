<?php


 function autoload_1fbc56a79bb35b7d61b43052c5bb1aee($class)
{
    $classes = array(
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpService' => __DIR__ .'/FeedFtpService.php',
        'Jp\YahooApis\YDN\V201911\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\YDN\V201911\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\YDN\V201911\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\YDN\V201911\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\YDN\V201911\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\YDN\V201911\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\YDN\V201911\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\YDN\V201911\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpSelector' => __DIR__ .'/FeedFtpSelector.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtp' => __DIR__ .'/FeedFtp.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpPage' => __DIR__ .'/FeedFtpPage.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpValues' => __DIR__ .'/FeedFtpValues.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpOperation' => __DIR__ .'/FeedFtpOperation.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\Operation' => __DIR__ .'/Operation.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\Operator' => __DIR__ .'/Operator.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\FeedFtpReturnValue' => __DIR__ .'/FeedFtpReturnValue.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\Schedule' => __DIR__ .'/Schedule.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ScheduleHourly' => __DIR__ .'/ScheduleHourly.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ScheduleDaily' => __DIR__ .'/ScheduleDaily.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ScheduleWeekly' => __DIR__ .'/ScheduleWeekly.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ItemListUploadType' => __DIR__ .'/ItemListUploadType.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ActiveStatus' => __DIR__ .'/ActiveStatus.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ScheduleType' => __DIR__ .'/ScheduleType.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\ScheduleWeek' => __DIR__ .'/ScheduleWeek.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\mutate' => __DIR__ .'/mutate.php',
        'Jp\YahooApis\YDN\V201911\FeedFtp\mutateResponse' => __DIR__ .'/mutateResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_1fbc56a79bb35b7d61b43052c5bb1aee');

// Do nothing. The rest is just leftovers from the code generation.
{
}
