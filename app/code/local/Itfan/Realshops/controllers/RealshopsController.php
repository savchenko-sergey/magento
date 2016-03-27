<?php

class Itfan_Realshops_RealshopsController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        $this->loadLayout();

//        echo "<pre>" . print_r($this->getLayout(), true) . "<pre>";
//        exit();

        $this->renderLayout();
    }
}