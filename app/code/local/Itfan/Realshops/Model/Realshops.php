<?php

class Itfan_Realshops_Model_Realshops extends Mage_Core_Model_Abstract
{
    const IMAGE_PATH = 'realshops';
    protected $_imagePath = 'realshops';

    protected function _construct()
    {
        $this->_init('itfan_realshops/realshops');
    }

    protected function _beforeSave()
    {
        if ($this->getData('filename/remove_filename')) {
            $this->unsImage();
        }
        try {

            $field = 'filename';
            $path = Mage::getBaseDir('media') . DS . $this->_imagePath . DS;

            $data = Mage::app()->getRequest()->getPost();
            $isRemove = array_key_exists('remove_filename', $data);
            $hasNew = !empty($_FILES[$field]['name']);

            // remove the old file
            if ($isRemove || $hasNew) {
                $oldName = isset($data['old_' . $field]) ? $data['old_' . $field] : '';
                if ($oldName) {
                    @unlink($path . $oldName);
                    $this->setData($field, '');
                }
            }

            $newName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $_FILES[$field]['name']);

            $uploader = new Varien_File_Uploader($field);
            $uploader->setFilesDispersion(false);
            $uploader->setAllowRenameFiles(false);
            $uploader->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
            $uploader->save($path, $newName);

            $this->setData($field, $newName);

        } catch (Exception $e) {
            Mage::log($e->getMessage(), null, 'e.log', true);
        }

        return parent::_beforeSave();
    }

    public function getImagePath()
    {
        return Mage::getBaseDir('media') . DS . $this->_imagePath . DS;
    }

    protected function _prepareImageForDelete()
    {
        $image = $this->getData('filename');
        return str_replace(Mage::getBaseUrl('media'), Mage::getBaseDir('media') . DS, $image['value']);
    }

    public function unsImage()
    {
        $image = $this->getData('filename');
        if (is_array($image)) {
            $image = $this->_prepareImageForDelete();
        } else {
            $image = $this->getImagePath() . $image;
        }

        if (file_exists($image)) {
            unlink($image);
        }
        $this->setData('filename', '');
        return $this;
    }

}