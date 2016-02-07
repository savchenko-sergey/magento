<?php

class Savchenko_Newslatter_Adminhtml_NewslatterController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        /*$this->loadLayout();
        $this->renderLayout();
        Mage::helper('savchenko_newslatter')->test();
*/
        $block = $this->getLayout()->createBlock('savchenko_newslatter/newslatter');
        $this->loadLayout();
        //$this->_setActiveMenu('newsletter/thecladdagh_newsletter');
        $this->_addContent($block)->renderLayout();
    }

    protected function _isAllowed()
    {
        return true;
    }
}