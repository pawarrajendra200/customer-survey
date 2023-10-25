define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Czargroup_Example/js/model/validate'
    ],
    function (Component, additionalValidators, orderCustomValidation) {
        'use strict';
        additionalValidators.registerValidator(orderCustomValidation);
        return Component.extend({});
    }
);