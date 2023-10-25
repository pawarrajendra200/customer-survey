<?php

/**
 * Czargroup Technologies
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the theninehertz.com license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Czargroup Technologies
 * @package     Czargroup_Example
 * @copyright   Copyright (c) Ninehertz India Pvt. Ltd. (https://www.czargroup.net/)
 * @license     -  
 */

declare(strict_types=1);

namespace Czargroup\Example\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    const SURVEY_QUESTIONS = 'survey/general/questions';

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var Json
     */
    protected $serialize;

    /**
     * Data construct
     * 
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param Json $serialize
     */
    public function __construct(
    Context $context,
    StoreManagerInterface $storeManager,
    Json $serialize)
    {
        $this->storeManager = $storeManager;
        $this->serialize = $serialize;
        parent::__construct($context);
    }

    public function getStoreid()
    {
        return $this->storeManager->getStore()->getId();
    }


    public function getSurveyQuestions()
    {
        $surveyConfig = $this->scopeConfig->getValue(self::SURVEY_QUESTIONS,ScopeInterface::SCOPE_STORE,$this->getStoreid());

        if($surveyConfig == '' || $surveyConfig == null)
            return false;

        $unserializedata = $this->serialize->unserialize($surveyConfig);

        $questions = array();
        foreach($unserializedata as $key => $row)
        {
            $questions[] = $row['name'];
        }

        $key = array_rand($questions);
        
        return $questions[$key];
    }
}