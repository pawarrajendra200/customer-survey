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

namespace Czargroup\Example\Observer;

use Magento\Framework\Event\ObserverInterface;

class OrderServey implements ObserverInterface
{

    /**
     * List of attributes that should be added to an order.
     *
     * @var array
     */
    private $attributes = [
        'survey_question',
        'survey_answer'
    ];


    /**

     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        foreach ($this->attributes as $attribute) {

            if ($quote->hasData($attribute)) {
                $order->setData($attribute, $quote->getData($attribute));
            }
        }

        return $this;
    }
}