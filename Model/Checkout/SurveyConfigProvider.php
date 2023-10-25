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

namespace Czargroup\Example\Model\Checkout;

use Czargroup\Example\Helper\Data as DataHelper;
use Magento\Checkout\Model\ConfigProviderInterface;

class SurveyConfigProvider implements ConfigProviderInterface 
{

    /**
     * @var DataHelper
     */
    protected $dataHelper;

    /**
     * Data construct
     * 
     * @param DataHelper $dataHelper
     */
    public function __construct(
        DataHelper $dataHelper)
        {
            $this->dataHelper = $dataHelper;
        }

    public function getConfig() {
        $output['customer_survey_name'] = $this->dataHelper->getSurveyQuestions();
        return $output;
    }
}