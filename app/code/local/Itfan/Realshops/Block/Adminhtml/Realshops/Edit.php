<?php

class Itfan_Realshops_Block_Adminhtml_Realshops_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_realshops'; // путь к контроллеру
        $this->_blockGroup = 'itfan_realshops'; // псевдоним блока из config.xml файла
        $this->_updateButton(
            'save',
            'label',
            Mage::helper('itfan_realshops')->__('Save Shop')
        );
        $this->_updateButton(
            'delete',
            'label',
            Mage::helper('itfan_realshops')->__('Delete Shop')
        );
        $this->_addButton(
            'saveandcontinue',
            array(
                'label'   => Mage::helper('itfan_realshops')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class'   => 'save',
            ),
            -100
        );
        $this->_formScripts[] = "
            function saveAndContinueEdit() {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }


    /*public function getHeaderText()
    {
        if (Mage::registry('current_shop') && Mage::registry('current_shop')->getId()) {
            return Mage::helper('itfan_test')->__(
                "Edit Shop '%s'",
                $this->escapeHtml(Mage::registry('current_shop')->getName())
            );
        } else {
            return Mage::helper('itfan_test')->__('Add Shop');
        }
    }*/
}

