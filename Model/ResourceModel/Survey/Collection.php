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

namespace Czargroup\Example\Model\ResourceModel\Survey;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    )
    {
        $this->_init('Czargroup\Example\Model\Survey', 'Czargroup\Example\Model\ResourceModel\Survey');
        
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
    }
    
    protected function _initSelect()
    {
        parent::_initSelect();
	
	    $this->getSelect()->columns("(select count(*) from ".$this->getTable('sales_order')." as soq where soq.survey_question=main_table.survey_question and soq.survey_answer='Yes') as answer_yes_orders");

	    $this->getSelect()->columns("(select count(*) from ".$this->getTable('sales_order')." as soa where soa.survey_question=main_table.survey_question and soa.survey_answer='No') as answer_no_orders");
		
        $this->getSelect()->where('main_table.survey_question IS NOT null')
        ->group('main_table.survey_question');

        $this->addFilterToMap('survey_question','main_table.survey_question');
    }
}
