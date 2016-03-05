<?php
$installer = $this;
$installer->startSetup();


$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('itfan_realshops/product')};
CREATE TABLE {$this->getTable('itfan_realshops/product')} (
`id` int(11) unsigned NOT NULL auto_increment,
`product_id` int(11) unsigned NOT NULL,
`realshop_id` int(11) unsigned NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();