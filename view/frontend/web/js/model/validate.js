define( 
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'Magento_Checkout/js/model/url-builder',
        'Magento_Checkout/js/model/quote',
        'mage/storage',
        'mage/validation',
    ],
    function ($, modal, urlBuilder,quote,storage) {
        'use strict';
        return {
            validate: function () {
                var orderFlag = true;
                $( "div.survey-error" ).html("");
                if(!$("input[name='customer_survey']:checked").val()) {
                    $( "div.survey-error" ).html("<div role='alert' class='message notice'><span>The customer survey is missing. Select the option and try again.</span></div>");   
                     orderFlag = false;
                }else{
                    var survey_answer = $("input[name='customer_survey']:checked").val();
                    var survey_question = window.checkoutConfig.customer_survey_name;
                    var quoteId = quote.getQuoteId();

                    var result = storage.post(
                        urlBuilder.createUrl('/sales/customer/survey', {}),
                        JSON.stringify({
                            quoteId: quoteId,
                            survey_question: survey_question,
                            survey_answer: survey_answer
                        })
    
                    );
                }
                
                return orderFlag;
            }
        };
    }
);