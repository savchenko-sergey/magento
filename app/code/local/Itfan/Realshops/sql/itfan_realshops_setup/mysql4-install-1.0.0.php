<?php

$installer = $this;
$installer->startSetup();

$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('itfan_realshops/realshops')};
CREATE TABLE {$this->getTable('itfan_realshops/realshops')} (
`id` int(11) unsigned NOT NULL auto_increment,
`title` varchar(255) NOT NULL default '',
`short_desc` text NOT NULL default '',
`full_desc` text NOT NULL default '',
`filename` varchar(255) NOT NULL default '',
`address` varchar(255) NOT NULL default '',
`status` smallint(6) NOT NULL default '0',
`created_at` TIMESTAMP NULL,
`updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();