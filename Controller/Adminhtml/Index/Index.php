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

namespace Czargroup\Example\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var Page
     */
    protected $resultPage;

    /**
     * Index construct
     * 
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
		
		$this->resultPage = $this->resultPageFactory->create();  
		$this->resultPage->setActiveMenu('Czargroup_Example::survey');
        $this->resultPage->getConfig()->getTitle()->prepend(__('Customer Survey'));
		return $this->resultPage;
    }

    /**
     * Page Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Czargroup_Example::survey');
    }
}
