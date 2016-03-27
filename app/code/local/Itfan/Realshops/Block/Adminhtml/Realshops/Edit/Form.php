<?php

class Itfan_Realshops_Block_Adminhtml_Realshops_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl(
                    '*/*/save',
                    array(
                        'id' => $this->getRequest()->getParam('id')
                    )
                ),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        $data = Mage::registry('itfan_realshop')->getData();
        $model = Mage::registry('itfan_realshop');

        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();

        $fieldset = $form->addFieldset('example_form', array(
            'legend' => $this->__('Edit Shop')
        ));

        $fieldset->addField('title', 'text', array(
            'label' => $this->__('Title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
        ));

        $fieldset->addField('short_desc', 'text', array(
            'label' => $this->__('short_desc'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'short_desc',
        ));

        $fieldset->addField(
            'full_desc',
            'editor',
            array(
                'label' => $this->__('Description'),
                'name' => 'full_desc',
                'config' => $wysiwygConfig,
                'required' => true,
                'class' => '',
            )
        );

        $fieldset->addField('filename', 'file', array(
            'label' => $this->__('filename'),
            'name' => 'filename',
            'after_element_html' => $this->getImageHtml('filename', $model->getFilename()),
        ));

        $fieldset->addField('address', 'text', array(
            'label' => $this->__('address'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'address',
        ));

        $fieldset->addField(
            'status',
            'select',
            array(
                'label' => $this->__('Status'),
                'name' => 'status',
                'required' => true,
                'class' => 'required-entry',
                'values' => array(
                    array(
                        'value' => 0,
                        'label' => $this->__('Disable'),
                    ),
                    array(
                        'value' => 1,
                        'label' => $this->__('Enable'),
                    ),
                ),
            )
        );

        $form->setValues($data);

        return parent::_prepareForm();
    }

    protected function getImageHtml($field, $img)
    {
        $html = '';
        if ($img) {
            $html .= '<p style="margin-top: 5px">';
            $html .= '<img src="' . Mage::getBaseUrl('media') . 'realshops/' . $img . '" />';
            $html .= '<br/><input type="checkbox" value="1" name="remove_' . $field . '"/> ' . $this->__('Remove');
            $html .= '<input type="hidden" value="' . $img . '" name="old_' . $field . '"/>';
            $html .= '</p>';
        }
        return $html;
    }
}
