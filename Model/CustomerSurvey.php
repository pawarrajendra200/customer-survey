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

namespace Czargroup\Example\Model;

use Czargroup\Example\Api\CustomerSurveyInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Quote\Model\QuoteRepository;
use Psr\Log\LoggerInterface;

class CustomerSurvey implements CustomerSurveyInterface
{
  
    /**
     * @var QuoteRepository
     */
    protected $quoteRepository;
    
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * CustomerSurvey construct
     * 
     * @param QuoteRepository $quoteRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        QuoteRepository $quoteRepository,
        LoggerInterface $logger
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->logger = $logger;
    }

    /**
    * {@inheritdoc}
    */
    public function save($quoteId,$survey_question,$survey_answer)
    {	
        try{
            $quote = $this->quoteRepository->get($quoteId);
            $quote->setData('survey_question', $survey_question);
            $quote->setData('survey_answer', $survey_answer);
            $this->quoteRepository->save($quote);
            
            $this->logger->info('survey question and answer saved in quote for id '.$quoteId);
            
            return;
        } catch (LocalizedException $exception) {
            throw new \Exception(__($exception->getMessage()));
        }
    }
}
