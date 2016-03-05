<?php

class Itfan_Realshops_Block_Frontend_Realshops extends Mage_Core_Block_Template
{
    
    public function getRealshopsCollection()
    {
        $realshopsCollection = Mage::getModel('itfan_realshops/realshops')->getCollection();
        $realshopsCollection->setOrder('created_at', 'DESC');
        
        return $realshopsCollection;
    }
    
    public function getRealshop()
    {

        $realshopId = Mage::app()->getRequest()->getParam('id', 0);
        $realshop = Mage::getModel('itfan_realshops/realshops')->load($realshopId);

        return $realshop;
    }
}

