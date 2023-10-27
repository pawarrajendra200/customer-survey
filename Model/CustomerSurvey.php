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
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Model\MaskedQuoteIdToQuoteIdInterface;
use Magento\Quote\Model\QuoteRepository;
use Psr\Log\LoggerInterface;

class CustomerSurvey implements CustomerSurveyInterface
{
  
    /**
     * @var MaskedQuoteIdToQuoteIdInterface
     */
    protected $maskedQuoteIdToQuoteId;

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
     * @param MaskedQuoteIdToQuoteIdInterface $maskedQuoteIdToQuoteId
     * @param QuoteRepository $quoteRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        MaskedQuoteIdToQuoteIdInterface $maskedQuoteIdToQuoteId,
        QuoteRepository $quoteRepository,
        LoggerInterface $logger
    ) {
        $this->maskedQuoteIdToQuoteId = $maskedQuoteIdToQuoteId;
        $this->quoteRepository = $quoteRepository;
        $this->logger = $logger;
    }

    /**
    * {@inheritdoc}
    */
    public function save($quoteId,$isMaskQuoteId,$surveyQuestion,$surveyAnswer)
    {
        try{

            if($isMaskQuoteId) {
                $quoteId = $this->getQuoteIdFromMaskedHash($quoteId);
            }

            $quote = $this->quoteRepository->get($quoteId);
            $quote->setData('survey_question', $surveyQuestion);
            $quote->setData('survey_answer', $surveyAnswer);
            $this->quoteRepository->save($quote);
            
            $this->logger->info('survey question and answer saved in quote for id '.$quoteId);
            
            return;
        } catch (NoSuchEntityException $exception) {
            throw new LocalizedException(__($exception->getMessage()));
        }
    }

    /**
     * get QuoteId by masked id.
     *
     * @param string
     * @return int
     * @throws LocalizedException
     */    
    private function getQuoteIdFromMaskedHash($maskedHashId) {
        try {
            $quoteId = $this->maskedQuoteIdToQuoteId->execute($maskedHashId);
        } catch (NoSuchEntityException $exception) {
            throw new LocalizedException(
                __('Could not find a cart with ID "%masked_cart_id"', ['masked_cart_id' => $maskedHashId])
            );
        }

        return $quoteId;
    }
}
