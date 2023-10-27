define(
    [
        'ko',
        'jquery',
        'uiComponent',
        'Magento_Checkout/js/model/url-builder',
        'mage/storage',
        'Magento_Checkout/js/model/quote',
        'Magento_Customer/js/model/customer'
    ],
    function (ko, $, Component,urlBuilder,storage,quote,customer) {
        'use strict';
        
        return Component.extend({
            defaults: {
                template: 'Czargroup_Example/checkout/customersurvey'
            },
            initObservable: function () {

                this._super()
                    .observe({
                        saveVals: ko.observable(false)
                    });
                    
                return this;
            },
            getSurvey: function () {
                return window.checkoutConfig.customer_survey_name;
            },

            addsurvey: function() {
                $( "div.survey-error" ).html("");
                var surveyAnswer = $("input[name='customer_survey']:checked").val();
                var surveyQuestion = window.checkoutConfig.customer_survey_name;
                var quoteId = quote.getQuoteId();
                var isMaskQuoteId = this.isLoggedIn() ? 0 : 1;
                var result = storage.post(
                    urlBuilder.createUrl('/sales/customer/survey', {}),
                    JSON.stringify({
                        quoteId: quoteId,
                        isMaskQuoteId: isMaskQuoteId,
                        surveyQuestion: surveyQuestion,
                        surveyAnswer: surveyAnswer
                    })

                );
                return true;
            },

            isLoggedIn: function () {
                return customer.isLoggedIn();
            } 
        });
    }
);
