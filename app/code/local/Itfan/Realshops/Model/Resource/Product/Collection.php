<?php

class Itfan_Realshops_Model_Resource_Product_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('itfan_realshops/product');
    }
}