<?php

class Savchenko_Newslatter_Model_Resource_Newslatter_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('savchenko_newslatter/newslatter');
    }
}