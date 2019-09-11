<?php

use yii\db\Migration;

/**
 * Class m190911_100035_init_customer_tables
 */
class m190911_100035_init_customer_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("CREATE TABLE `customers` (
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-n/a 1-male 2-female',
  `date` datetime NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customer data';
");
        $this->execute("ALTER TABLE `customers`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `email` (`email`);");


        $this->execute("CREATE TABLE `addreses` (
  `customer_login` varchar(50) NOT NULL,
  `post_index` varchar(12) NOT NULL,
  `country` varchar(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` int(100) NOT NULL,
  `house` varchar(4) NOT NULL,
  `appartament` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
        $this->execute("ALTER TABLE `addreses`
  ADD KEY `Login_key` (`customer_login`);
");
        $this->execute("ALTER TABLE `addreses`
  ADD CONSTRAINT `Login_key` FOREIGN KEY (`customer_login`) REFERENCES `customers` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("addreses");
        $this->dropTable("customers");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190911_100035_init_customer_tables cannot be reverted.\n";

        return false;
    }
    */
}
