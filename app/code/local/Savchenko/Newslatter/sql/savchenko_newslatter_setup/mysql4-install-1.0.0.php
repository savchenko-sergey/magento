<?php
die('sql script die');
$this->startSetup();

$table = new Varien_Db_Ddl_Table();

$table->setName($this->getTable('savchenko_newslatter/newslatter'));

$table->addColumn('id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    11,
    ['primary' => true, 'auto_increment' => true]
);
$table->addColumn('name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255
);
$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

$this->getConnection()->createTable($table);
$this->endSetup();