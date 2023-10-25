<?php

/**
 * Ninehertz India Pvt. Ltd. 
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
 * @category    Ninehertz India Pvt. Ltd.
 * @package     Nh_Example
 * @copyright   Copyright (c) Ninehertz India Pvt. Ltd. (https://theninehertz.com/)
 * @license     -  
 */

 declare(strict_types=1);

namespace Czargroup\Example\Model;

use Magento\Framework\Model\AbstractModel;

class Survey extends AbstractModel
{
    /**
     * Rule page cache tag.
     */
    const CACHE_TAG = 'czar_rule_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'czar_rule_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'czar_rule_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Czargroup\Example\Model\ResourceModel\Survey');
    }

}
