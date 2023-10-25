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

namespace Czargroup\Example\Model\ResourceModel\Survey\Survey;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Search\AggregationInterface;
use Magento\Store\Model\StoreManagerInterface;
use Czargroup\Example\Model\ResourceModel\Survey\Collection as SurveyCollection;
use Psr\Log\LoggerInterface;

class Collection extends SurveyCollection implements SearchResultInterface
{ 
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        $mainTable,
        $eventPrefix,
        $eventObject,
        $resourceModel,
        $model = 'Magento\Framework\View\Element\UiComponent\DataProvider\Document',
        $connection = null,
        AbstractDb $resource = null
    )
    {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $storeManager,
            $connection,
            $resource
        );
        $this->_eventPrefix = $eventPrefix;
        $this->_eventObject = $eventObject;
        $this->_init($model, $resourceModel);
        $this->setMainTable($mainTable);
    }

    public function getAggregations()
    {
        return $this->aggregations;
    }

    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    public function getSearchCriteria()
    {
        return null;
    }

    public function setSearchCriteria(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null
    ) {
        return $this;
    }
    
    public function getTotalCount()
    {
        return $this->getSize();
    }
  
    public function setTotalCount($totalCount)
    {
        return $this;
    }
   
    public function setItems(array $items = null)
    {
        return $this;
    }
}