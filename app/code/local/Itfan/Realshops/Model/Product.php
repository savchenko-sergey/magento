<?php

class Itfan_Realshops_Model_Product extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('itfan_realshops/product');
    }

    public function compareEntities($realshopIds, $productId)
    {
        $ids = Mage::getModel('itfan_realshops/product')
            ->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->getColumnValues('realshop_id');

        if ((is_array($realshopIds) && is_array($ids)) && $ids != $realshopIds) {

            $this->_deleteRealshops($productId);
            $this->_saveNewRealshops($productId, $realshopIds);
        }
    }

    protected function _deleteRealshops($productId)
    {
        $collection = Mage::getModel('itfan_realshops/product')
            ->getCollection()
            ->addFieldToFilter('product_id', $productId);

        foreach ($collection as $item) {
            $item->delete();
        }
    }

    protected function _saveNewRealshops($productId, $realshopIds)
    {
        foreach ($realshopIds as $item) {
            $element = Mage::getModel('itfan_realshops/product');
            $element->setData('product_id', $productId);
            $element->setData('realshop_id', $item);
            $element->save();
        }
    }
    
    public function getData($key='', $index=null) 
    {
        if('realshops' == $key) {
            return $this->getRealshops();
        }else {
            return parent::getData($key, $index);
        }
    }
    
    public function setData($key, $value=null) 
    {
        if('realshops' == $key) {
            $this->setRealshops($value);
        }else {
            parent::setData($key, $value);
        }
        
        return $this;
    }
    
    public function hasData($key='', $index=null) 
    {
        if('realshops' == $key) {
            return $this->hasRealshops();
        }else {
            return parent::hasData($key, $index);
        }
    }
    
    public function unsData($key='', $index=null) 
    {
        if('realshops' == $key) {
            return $this->unsRealshops();
        }else {
            return parent::unsData($key, $index);
        }
    }
    
    public function setRealshops($ids) 
    {
        
    }
    
    public function hasRealshops($ids) 
    {
        
    }
}