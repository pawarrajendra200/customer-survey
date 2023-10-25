# Overview
## Purpose of module

Czargroup\Example is responsible for following task.
1) Create system dynamic row configration for get survey questions
2) Create your custom end Point using Rest API store customer servey to quote
3) move customer servey from quote to order
4) show customer servey to sale order grid
5) create customer suervey grid for see number of orders for each question and the survey


## Install
### Add repository
Repositry : composer config repositories.rajtech-czargroup-example git https://github.com/pawarrajendra200/customer-survey.git

### Install the Extension using Composer
composer require czargroup/example=dev-master

### Enable the Extension

php bin/magento module:enable Czargroup_Example

### Last execute magento commanads
1) php bin/magento setup:upgrade
2) php bin/magento setup:di:compile
3) php bin/magento setup:static-content:deploy
4) php bin/magento setup:cache:flush

