<?php

class Savchenko_Newslatter_Adminhtml_NewslatterController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        /*$result = Mage::getModel('savchenko_newslatter/newslatter')->load(1);

        echo "<pre>";
        print_r($result->getId());
        print_r($result->setName('newName'));
        echo "</pre>";
        $result->save();
        die();*/

        /*$block = $this->getLayout()->createBlock('savchenko_newslatter/newslatter');
        $this->loadLayout();
        $this->_addContent($block)->renderLayout();*/

        $this->loadLayout();
        $this->renderLayout();
    }

    protected function _isAllowed()
    {
        return true;
    }
}