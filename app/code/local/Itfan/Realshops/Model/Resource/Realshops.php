<?php

class Itfan_Realshops_Model_Resource_Realshops extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('itfan_realshops/realshops', 'id');
    }
    
    protected function _afterDelete()
    {
        $helper = Mage::helper('itfan_realshops');
        @unlink($helper->getImagePath($this->getId()));
        return parent::_afterDelete();
    }

//    public function getImageUrl()
//    {
//        $helper = Mage::helper('itfan_realshops');
//        if ($this->getId() && file_exists($helper->getImagePath($this->getId()))) {
//            return $helper->getImageUrl($this->getId());
//        }
//        return null;
//    }
}