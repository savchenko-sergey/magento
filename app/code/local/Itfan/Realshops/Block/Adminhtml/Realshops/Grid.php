<?php

class Itfan_Realshops_Block_Adminhtml_Realshops_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        //$this->setId('shopGrid');
        //$this->setDefaultSort('entity_id');
        //$this->setDefaultDir('ASC');
        //$this->setSaveParametersInSession(true);
        //$this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        /*$collection = Mage::getModel('catalog/product')
            ->getCollection();
        $this->setCollection($collection);*/

        $collection = Mage::getModel('itfan_realshops/realshops')
            ->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            array(
                'header' => $this->__('Id'),
                'index'  => 'id',
                'type'   => 'number'
            )
        );
        $this->addColumn(
            'title',
            array(
                'header'    => $this->__('Title'),
                'align'     => 'left',
                'index'     => 'title',
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
