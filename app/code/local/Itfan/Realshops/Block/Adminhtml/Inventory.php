<?php

class Itfan_Realshops_Block_Adminhtml_Inventory extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Inventory
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('catalog/product/tab/custom_inventory.phtml');
    }

}
