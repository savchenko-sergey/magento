<?php

class Itfan_Realshops_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLE = true;

    public function isEnable()
    {
        return self::XML_PATH_ENABLE;
    }

    public function getUrl($id)
    {
        return Mage::app()->getStore()->getBaseUrl() . 'index.php/realshops/realshops/view/id/' . $id;
    }
    
}