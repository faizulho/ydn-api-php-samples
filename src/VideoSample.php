<?php
require_once(dirname(__FILE__) . '/../conf/api_config.php');
require_once(dirname(__FILE__) . '/SoapUtils.class.php');

/**
 * Sample Program for VideoService, MediaService, CampaignService, AdGroupService, AdGroupAdService, AdGroupTargetService.
 * Copyright (C) 2017 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// VideoService
//=================================================================
$videoService = SoapUtils::getService('VideoService');

//-----------------------------------------------
// VideoService::getUploadUrl
//-----------------------------------------------
$getUploadUrlRequest = array(
    'accountId' => SoapUtils::getAccountId(),
    'uploadVideo' => array(
        'videoName' => 'SampleVideo_CreateOn_' . SoapUtils::getCurrentTimestamp() . '.mp4',
        'videoTitle' => 'SampleVideo_CreateOn_' . SoapUtils::getCurrentTimestamp(),
        'userStatus' => 'ACTIVE'
    ),
);
$getUploadUrlResponse = $videoService->invoke('getUploadUrl', $getUploadUrlRequest);
$uploadUrl = $getUploadUrlResponse->rval->values->uploadUrlValue->uploadUrl;

//-----------------------------------------------
// VideoService::upload
//-----------------------------------------------
// upload
$uploadVideoResponse = SoapUtils::upload($uploadUrl, 'SampleVideoUpload.mp4');
if ($uploadVideoResponse === false) {
    exit();
}
$uploadVideoResponseObj = json_decode($uploadVideoResponse);
$mediaId = $uploadVideoResponseObj->ResultSet->Result[0]->uploadVideoData->mediaId;

//-----------------------------------------------
// VideoService::get
//-----------------------------------------------
//request
$getVideoRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'mediaIds' => array($mediaId),
        'userStatus' => array('ACTIVE', 'PAUSED'),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getVideoResponse = $videoService->invoke('get', $getVideoRequest);

//response
if (isset($getVideoResponse->rval->values->video)) {
    $video = $getVideoResponse->rval->values->video;
} else {
    if (isset($getVideoResponse->rval->values[0]->video)) {
        $video = $getVideoResponse->rval->values[0]->video;
    } else {
        echo 'Fail to get Video.';
        exit();
    }
}

//-----------------------------------------------
// VideoService::mutate(SET)
//-----------------------------------------------
//request
$setVideoRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'mediaId' => $video->mediaId,
                'videoTitle' => 'SampleVideo_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
            ),
        ),
    ),
);

//call API
$setVideoResponse = $videoService->invoke('mutate', $setVideoRequest);

//response
if (isset($setVideoResponse->rval->values->video)) {
    $video = $setVideoResponse->rval->values->video;
} else {
    if (isset($setVideoResponse->rval->values[0]->video)) {
        $media = $setVideoResponse->rval->values[0]->video;
    } else {
        echo 'Fail to set Video.';
        exit();
    }
}

//=================================================================
// CampaignService
//=================================================================
$campaignService = SoapUtils::getService('CampaignService');

//-----------------------------------------------
// CampaignService::mutate(ADD)
//-----------------------------------------------
//request
$addCampaignRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignName' => 'SampleCampaign_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'amount' => 3000,
                    'deliveryMethod' => 'STANDARD',
                ),
                'biddingStrategy' => array(
                    'type' => 'MANUAL_CPV',
                ),
                'adProductType' => 'VIDEO_AD',
            ),
        ),
    ),
);

//xsi:type for biddingStrategy
$addCampaignRequest['operations']['operand'][0]['biddingStrategy'] =
    SoapUtils::encodingSoapVar($addCampaignRequest['operations']['operand'][0]['biddingStrategy'], 'ManualCPV','Campaign' , 'biddingStrategy');

//call API
$addCampaignResponse = $campaignService->invoke('mutate', $addCampaignRequest);

//response
if (isset($addCampaignResponse->rval->values->campaign)) {
    $campaign = $addCampaignResponse->rval->values->campaign;
} else {
    if (isset($addCampaignResponse->rval->values[0]->campaign)) {
        $campaign = $addCampaignResponse->rval->values[0]->campaign;
    } else {
        echo 'Fail to add Campaign.';
        exit();
    }
}

//-----------------------------------------------
// CampaignService::get
//-----------------------------------------------
//request
$getCampaignRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array($campaign->campaignId),
        'userStatus' => array('ACTIVE', 'PAUSED'),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getCampaignResponse = $campaignService->invoke('get', $getCampaignRequest);

//response
if (isset($getCampaignResponse->rval->values->campaign)) {
    $campaign = $getCampaignResponse->rval->values->campaign;
} else {
    if (isset($getCampaignResponse->rval->values[0]->campaign)) {
        $campaign = $getCampaignResponse->rval->values[0]->campaign;
    } else {
        echo 'Fail to get Campaign.';
        exit();
    }
}

//-----------------------------------------------
// CampaignService::mutate(SET)
//-----------------------------------------------
//request
$setCampaignRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'campaignName' => 'SampleCampaign_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'startDate' => '20300101',
                'endDate' => '20301231',
                'budget' => array(
                    'amount' => 3000,
                    'deliveryMethod' => 'STANDARD',
                ),
                'biddingStrategy' => array(
                    'type' => 'MANUAL_CPV',
                ),
            ),
        ),
    ),
);

//xsi:type for biddingStrategy
$setCampaignRequest['operations']['operand'][0]['biddingStrategy'] =
    SoapUtils::encodingSoapVar($setCampaignRequest['operations']['operand'][0]['biddingStrategy'], 'ManualCPV','Campaign' , 'biddingStrategy');

//call API
$setCampaignResponse = $campaignService->invoke('mutate', $setCampaignRequest);

//response
if (isset($setCampaignResponse->rval->values->campaign)) {
    $campaign = $setCampaignResponse->rval->values->campaign;
} else {
    if (isset($setCampaignResponse->rval->values[0]->campaign)) {
        $campaign = $setCampaignResponse->rval->values[0]->campaign;
    } else {
        echo 'Fail to set Campaign.';
        exit();
    }
}

//=================================================================
// AdGroupService
//=================================================================
$adGroupService = SoapUtils::getService('AdGroupService');

//-----------------------------------------------
// AdGroupService::mutate(ADD)
//-----------------------------------------------
//request
$addAdGroupRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupName' => 'SampleAdGroup_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'bid' => array(
                    'type' => 'MANUAL_CPV',
                    'maxCpv' => '1000',
                ),
                'device' => 'SMARTPHONE',
                'deviceApp' => 'APP',
                'deviceOs' => 'IOS',
            ),
        ),
    ),
);

//xsi:type for bid
$addAdGroupRequest['operations']['operand'][0]['bid'] =
    SoapUtils::encodingSoapVar($addAdGroupRequest['operations']['operand'][0]['bid'], 'ManualCPVAdGroupBid','AdGroup' , 'bid');

//call API
$addAdGroupResponse = $adGroupService->invoke('mutate', $addAdGroupRequest);

//response
if (isset($addAdGroupResponse->rval->values->adGroup)) {
    $adGroup = $addAdGroupResponse->rval->values->adGroup;
} else {
    if (isset($addAdGroupResponse->rval->values[0]->adGroup)) {
        $adGroup = $addAdGroupResponse->rval->values[0]->adGroup;
    } else {
        echo 'Fail to add AdGroup.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupService::get
//-----------------------------------------------
//request
$getAdGroupRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array($campaign->campaignId),
        'adGroupIds' => array($adGroup->adGroupId),
        'userStatus' => array('ACTIVE', 'PAUSED'),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getAdGroupResponse = $adGroupService->invoke('get', $getAdGroupRequest);

//response
if (isset($getAdGroupResponse->rval->values->adGroup)) {
    $adGroup = $getAdGroupResponse->rval->values->adGroup;
} else {
    if (isset($getAdGroupResponse->rval->values[0]->adGroup)) {
        $adGroup = $getAdGroupResponse->rval->values[0]->adGroup;
    } else {
        echo 'Fail to get AdGroup.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupService::mutate(SET)
//-----------------------------------------------
//request
$setAdGroupRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'adGroupName' => 'SampleAdGroup_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'bid' => array(
                    'type' => 'MANUAL_CPV',
                    'maxCpv' => '1100',
                ),
            ),
        ),
    ),
);

//xsi:type for bid
$setAdGroupRequest['operations']['operand'][0]['bid'] =
    SoapUtils::encodingSoapVar($setAdGroupRequest['operations']['operand'][0]['bid'], 'ManualCPVAdGroupBid','AdGroup' , 'bid');

//call API
$setAdGroupResponse = $adGroupService->invoke('mutate', $setAdGroupRequest);

//response
if (isset($setAdGroupResponse->rval->values->adGroup)) {
    $adGroup = $setAdGroupResponse->rval->values->adGroup;
} else {
    if (isset($setAdGroupResponse->rval->values[0]->adGroup)) {
        $adGroup = $setAdGroupResponse->rval->values[0]->adGroup;
    } else {
        echo 'Fail to set AdGroup.';
        exit();
    }
}

//=================================================================
// MediaService
//=================================================================
$mediaService = SoapUtils::getService('MediaService');

//-----------------------------------------------
// MediaService::mutate(ADD)
//-----------------------------------------------
//request
$file_path = dirname(__FILE__) . '/../upload/SampleMedia.jpg';
$file = file_get_contents($file_path);
if (!$file) {
    echo 'Fail to add Media.';
    exit();
}
$addMediaRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'mediaName' => 'SampleMedia_CreateOn_' . SoapUtils::getCurrentTimestamp() . '.jpg',
                'mediaTitle' => 'SampleMedia_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'ACTIVE',
                'thumbnailFlg' => 'TRUE',
                'media' => array(
                    'data' => $file,
                ),
            ),
        ),
    ),
);

//xsi:type for media
$addMediaRequest['operations']['operand'][0]['media'] =
    SoapUtils::encodingSoapVar($addMediaRequest['operations']['operand'][0]['media'], 'ImageMedia','Media' , 'media');

//call API
$addMediaResponse = $mediaService->invoke('mutate', $addMediaRequest);

//response
if (isset($addMediaResponse->rval->values->mediaRecord)) {
    $media = $addMediaResponse->rval->values->mediaRecord;
} else {
    if (isset($addMediaResponse->rval->values[0]->mediaRecord)) {
        $media = $addMediaResponse->rval->values[0]->mediaRecord;
    } else {
        echo 'Fail to add Media.';
        exit();
    }
}

//=================================================================
// AdGroupAdService
//=================================================================
$adGroupAdService = SoapUtils::getService('AdGroupAdService');

//-----------------------------------------------
// AdGroupAdService::mutate(ADD)
//-----------------------------------------------
//request
$addAdGroupAdRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'adGroupId' => $adGroup->adGroupId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'adName' => 'SampleAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'adStyle' => 'VIDEO',
                'mediaId' => $video->mediaId,
                'userStatus' => 'ACTIVE',
                'bid' => array(
                    'type' => 'MANUAL_CPV',
                    'maxCpv' => '1000',
                ),
                'ad' => array(
                    'type' => 'VIDEO_AD',
                    'thumbnailMediaId' => $media->mediaId,
                    'headline' => 'sample headline',
                    'description' => 'sample ad desc',
                    'url' => 'http://www.yahoo.co.jp/',
                    'displayUrl' => 'www.yahoo.co.jp',
                    'principal' => 'sample ad principal',
                ),
            ),
        ),
    ),
);

//xsi:type for bid
$addAdGroupAdRequest['operations']['operand'][0]['bid'] =
    SoapUtils::encodingSoapVar($addAdGroupAdRequest['operations']['operand'][0]['bid'], 'ManualCPVAdGroupAdBid','AdGroupAd' , 'bid');

//xsi:type for ad
$addAdGroupAdRequest['operations']['operand'][0]['ad'] =
    SoapUtils::encodingSoapVar($addAdGroupAdRequest['operations']['operand'][0]['ad'], 'VideoAd','AdGroupAd' , 'ad');

//call API
$addAdGroupAdResponse = $adGroupAdService->invoke('mutate', $addAdGroupAdRequest);

//response
if (isset($addAdGroupAdResponse->rval->values->adGroupAd)) {
    $adGroupAd = $addAdGroupAdResponse->rval->values->adGroupAd;
} else {
    if (isset($addAdGroupAdResponse->rval->values[0]->adGroupAd)) {
        $adGroupAd = $addAdGroupAdResponse->rval->values[0]->adGroupAd;
    } else {
        echo 'Fail to add AdGroupAd.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupAdService::get
//-----------------------------------------------
//request
$getAdGroupAdRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array($campaign->campaignId),
        'adGroupIds' => array($adGroup->adGroupId),
        'adIds' => array($adGroupAd->adId),
        'userStatus' => array('ACTIVE', 'PAUSED'),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getAdGroupAdResponse = $adGroupAdService->invoke('get', $getAdGroupAdRequest);

//response
if (isset($getAdGroupAdResponse->rval->values->adGroupAd)) {
    $adGroupAd = $getAdGroupAdResponse->rval->values->adGroupAd;
} else {
    if (isset($getAdGroupAdResponse->rval->values[0]->adGroupAd)) {
        $adGroupAd = $getAdGroupAdResponse->rval->values[0]->adGroupAd;
    } else {
        echo 'Fail to get AdGroupAd.';
        exit();
    }
}

//sleep 10 second for review
echo "\n***** sleep 10 seconds for ad review *****\n";
sleep(10);

//-----------------------------------------------
// AdGroupAdService::mutate(SET)
//-----------------------------------------------
//request
$setAdGroupAdRequest = array(
    'operations' => array(
        'operator' => 'SET',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'adGroupId' => $adGroup->adGroupId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'adId' => $adGroupAd->adId,
                'adName' => 'SampleAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'userStatus' => 'PAUSED',
                'bid' => array(
                    'type' => 'MANUAL_CPV',
                    'maxCpv' => '1100',
                ),
                'ad' => array(
                    'type' => 'VIDEO_AD',
                    'url' => 'http://www.yahoo.co.jp/',
                    'displayUrl' => 'www.yahoo.co.jp',
                    'headline' => 'sample headline',
                    'description' => 'sample ad desc',
                ),
            ),
        ),
    ),
);

//xsi:type for bid
$setAdGroupAdRequest['operations']['operand'][0]['bid'] =
    SoapUtils::encodingSoapVar($setAdGroupAdRequest['operations']['operand'][0]['bid'], 'ManualCPVAdGroupAdBid','AdGroupAd' , 'bid');

//xsi:type for ad
$setAdGroupAdRequest['operations']['operand'][0]['ad'] =
    SoapUtils::encodingSoapVar($setAdGroupAdRequest['operations']['operand'][0]['ad'], 'VideoAd','AdGroupAd' , 'ad');

//call API
$setAdGroupAdResponse = $adGroupAdService->invoke('mutate', $setAdGroupAdRequest);

//response
if (isset($setAdGroupAdResponse->rval->values->adGroupAd)) {
    $adGroupAd = $setAdGroupAdResponse->rval->values->adGroupAd;
} else {
    if (isset($setAdGroupAdResponse->rval->values[0]->adGroupAd)) {
        $adGroupAd = $setAdGroupAdResponse->rval->values[0]->adGroupAd;
    } else {
        echo 'Fail to set AdGroupAd.';
        exit();
    }
}

//=================================================================
// AdGroupTargetService
//=================================================================
$adGroupTargetService = SoapUtils::getService('AdGroupTargetService');

//-----------------------------------------------
// AdGroupTargetService::mutate(ADD)
//-----------------------------------------------
//request
$addAdGroupTargetRequest = array(
    'operations' => array(
        'operator' => 'ADD',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'bidMultiplier' => 1.15,
                'target' => array(
                    'type' => 'AD_SCHEDULE_TARGET',
                    'dayOfWeek' => 'MONDAY',
                    'startHour' => '13',
                    'endHour' => '14',
                )
            ),
        ),
    ),
);
//xsi:type for targets of AdScheduleTarget
$addAdGroupTargetRequest['operations']['operand'][0]['target'] =
    SoapUtils::encodingSoapVar($addAdGroupTargetRequest['operations']['operand'][0]['target'], 'AdScheduleTarget','AdGroupTarget' , 'target');

//call API
$addAdGroupTargetResponse = $adGroupTargetService->invoke('mutate', $addAdGroupTargetRequest);

//response
if (isset($addAdGroupTargetResponse->rval->values->adGroupTargetList)) {
    $targetList = $addAdGroupTargetResponse->rval->values->adGroupTargetList;
} else {
    if (isset($addAdGroupTargetResponse->rval->values[0]->adGroupTargetList)) {
        $targetList = $addAdGroupTargetResponse->rval->values[0]->adGroupTargetList;
    } else {
        echo 'Fail to add AdGroupTarget.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupTargetService::get
//-----------------------------------------------
//request
$getAdGroupTargetRequest = array(
    'selector' => array(
        'accountId' => SoapUtils::getAccountId(),
        'campaignIds' => array($campaign->campaignId),
        'adGroupIds' => array($adGroup->adGroupId),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20,
        ),
    ),
);

//call API
$getAdGroupTargetResponse = $adGroupTargetService->invoke('get', $getAdGroupTargetRequest);

//response
if (isset($getAdGroupTargetResponse->rval->values->adGroupTargetList)) {
    $targetList = $getAdGroupTargetResponse->rval->values->adGroupTargetList;
} else {
    if (isset($getAdGroupTargetResponse->rval->values[0]->adGroupTargetList)) {
        $targetList = $getAdGroupTargetResponse->rval->values[0]->adGroupTargetList;
    } else {
        echo 'Fail to get AdGroupTarget.';
        exit();
    }
}

//=================================================================
// remove AdGroupAd, AdGroup, Campaign
//=================================================================
//-----------------------------------------------
// AdGroupAdService::mutate(REMOVE)
//-----------------------------------------------
//request
$removeAdGroupAdRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'adGroupId' => $adGroup->adGroupId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'adId' => $adGroupAd->adId,
            ),
        ),
    ),
);

//call API
$removeAdGroupAdResponse = $adGroupAdService->invoke('mutate', $removeAdGroupAdRequest);

//response
if (isset($removeAdGroupAdResponse->rval->values->adGroupAd)) {
    $removedAdGroupAd = $removeAdGroupAdResponse->rval->values->adGroupAd;
} else {
    if (isset($removeAdGroupAdResponse->rval->values[0]->adGroupAd)) {
        $removedAdGroupAd = $removeAdGroupAdResponse->rval->values[0]->adGroupAd;
    } else {
        echo 'Fail to remove AdGroupAd.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupTargetService::mutate(REMOVE)
//-----------------------------------------------
//request
$removeAdGroupTargetRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
                'bidMultiplier' => 1.15,
                'target' => array(
                    'type' => 'AD_SCHEDULE_TARGET',
                    'targetId' => $targetList->target->targetId,
                )
            ),
        ),
    ),
);

//xsi:type for targets of AdScheduleTarget
$removeAdGroupTargetRequest['operations']['operand'][0]['target'] =
    SoapUtils::encodingSoapVar($removeAdGroupTargetRequest['operations']['operand'][0]['target'], 'AdScheduleTarget','AdGroupTarget' , 'target');

//call API
$removeAdGroupTargetResponse = $adGroupTargetService->invoke('mutate', $removeAdGroupTargetRequest);

//response
if (isset($removeAdGroupTargetResponse->rval->values->adGroupTargetList)) {
    $targetList = $removeAdGroupTargetResponse->rval->values->adGroupTargetList;
} else {
    if (isset($removeAdGroupTargetResponse->rval->values[0]->adGroupTargetList)) {
        $targetList = $removeAdGroupTargetResponse->rval->values[0]->adGroupTargetList;
    } else {
        echo 'Fail to remove AdGroupTarget.';
        exit();
    }
}

//-----------------------------------------------
// AdGroupService::mutate(REMOVE)
//-----------------------------------------------
//request
$removeAdGroupRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'campaignId' => $campaign->campaignId,
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
                'adGroupId' => $adGroup->adGroupId,
            ),
        ),
    ),
);

//call API
$removeAdGroupResponse = $adGroupService->invoke('mutate', $removeAdGroupRequest);

//response
if (isset($removeAdGroupResponse->rval->values->adGroup)) {
    $removedAdGroup = $removeAdGroupResponse->rval->values->adGroup;
} else {
    if (isset($removeAdGroupResponse->rval->values[0]->adGroup)) {
        $removedAdGroup = $removeAdGroupResponse->rval->values[0]->adGroup;
    } else {
        echo 'Fail to remove AdGroup.';
        exit();
    }
}

//-----------------------------------------------
// CampaignService::mutate(REMOVE)
//-----------------------------------------------
//request
$removeCampaignRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'campaignId' => $campaign->campaignId,
            ),
        ),
    ),
);

//call API
$removeCampaignResponse = $campaignService->invoke('mutate', $removeCampaignRequest);

//response
if (isset($removeCampaignResponse->rval->values->campaign)) {
    $removedCampaign = $removeCampaignResponse->rval->values->campaign;
} else {
    if (isset($removeCampaignResponse->rval->values[0]->campaign)) {
        $removedCampaign = $removeCampaignResponse->rval->values[0]->campaign;
    } else {
        echo 'Fail to remove Campaign.';
        exit();
    }
}

//-----------------------------------------------
// VideoService::mutate(REMOVE)
//-----------------------------------------------
//request
$removeVideoRequest = array(
    'operations' => array(
        'operator' => 'REMOVE',
        'accountId' => SoapUtils::getAccountId(),
        'operand' => array(
            array(
                'accountId' => SoapUtils::getAccountId(),
                'mediaId' => $video->mediaId,
            ),
        ),
    ),
);

//call API
$removeVideoResponse = $videoService->invoke('mutate', $removeVideoRequest);

//response
if (isset($removeVideoResponse->rval->values->video)) {
    $removedVideo = $removeVideoResponse->rval->values->video;
} else {
    if (isset($removeVideoResponse->rval->values[0]->video)) {
        $removedVideo = $removeVideoResponse->rval->values[0]->video;
    } else {
        echo 'Fail to remove Video.';
        exit();
    }
}
