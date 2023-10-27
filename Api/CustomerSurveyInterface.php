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

namespace Czargroup\Example\Api;
 
interface CustomerSurveyInterface
{
    /**
     * @api
     * Save customer survey
     * @param string $quoteId
     * @param bool $isMaskQuoteId
     * @param string $surveyQuestion
     * @param string $surveyAnswer
     * @return bool
     */
 
    public function save($quoteId,$isMaskQuoteId,$surveyQuestion,$surveyAnswer);
}