define( 
    [
        'jquery',
        'Magento_Ui/js/modal/modal',        
        'mage/validation',
    ],
    function ($, modal) {
        'use strict';
        return {
            validate: function () {
                var orderFlag = true;
                $( "div.survey-error" ).html("");
                if(!$("input[name='customer_survey']:checked").val()) {
                    $( "div.survey-error" ).html("<div role='alert' class='message notice'><span>The customer survey is missing. Select the option and try again.</span></div>");   
                     orderFlag = false;
                }
                
                return orderFlag;
            }
        }
    }
);