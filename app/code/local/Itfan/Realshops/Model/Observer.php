<?php

class Itfan_Realshops_Model_Observer
{
    public function checkRealshopsInProduct($observer)
    {
        $productId = $observer->getEvent()->getProduct()->getId();;

        $params = Mage::app()->getRequest()->getParam('product');
        $realshopIds = $params['stock_data']['inventory_realshops'];

        Mage::getModel('itfan_realshops/product')->compareEntities($realshopIds, $productId);
    }
}