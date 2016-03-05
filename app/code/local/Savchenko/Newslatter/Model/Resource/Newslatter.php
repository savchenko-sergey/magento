<?php

class Savchenko_Newslatter_Model_Resource_Newslatter extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('savchenko_newslatter/newslatter', 'id');
    }
}