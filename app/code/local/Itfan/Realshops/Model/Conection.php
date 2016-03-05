<?php

class Itfan_Realshops_Model_Conection 
{
    private $_readConnection = null;
    
    protected function _getReadConnection()
    {
        if (null == $this->_readConnection) {
//            $this->_readConnection = SONE INIT CODE
        }
        
        return $this->_readConnection;
    }
}
