define(
    [
        'ko',
        'jquery',
        'uiComponent',
        'mage/url'
    ],
    function (ko, $, Component,url) {
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
            }
        });
    }
);
