<?php

class Itfan_Realshops_Block_Adminhtml_Realshops extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_realshops'; // путь к контроллеру
        $this->_blockGroup = 'itfan_realshops'; // псевдоним блока из config.xml файла

        parent::__construct();
        $this->_headerText = 'Realshops';

        $this->_addButtonLabel = 'Add';
    }
}
