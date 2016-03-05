<?php

class Itfan_Realshops_Model_Realshops extends Mage_Core_Model_Abstract
{
    protected $_imagePath = 'realshops';
    
    protected function _construct()
    {
        $this->_init('itfan_realshops/realshops');
    }
    
    public function getImage()
    {
        //resize 
        $image = $this->getData('filename');

        if (!empty($image)) {
            $imageUrl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . $this->_imagePath . DS . $image;
        } else {
            $imageUrl = '';
        }

        return $imageUrl;
    }
    
    protected function _beforeSave()
    {
        if ($this->getData('filename/delete')) {
            $this->unsImage();
        }
        try {
            
            $uploader = new Varien_File_Uploader('filename');
            //var_dump($uploader); die();
            $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
            $uploader->setAllowRenameFiles(true);                     
            $this->setImage($uploader);

        } catch (Exception $e) {
            var_dump($e); die();
            // it means that we do not have files for uploading
        }
        
        return parent::_beforeSave();
    }
    
    public function setImage($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());            
            $image = $image->getUploadedFileName();

        }

        $this->setData('filename', $image);
        return $this;
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