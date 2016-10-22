<?php

use Agreed\Technical\Configuration;

$configuration = new Configuration;
$configuration->set ( 'file system disks', require configuration_path ( ) . '/file system/disks.php' );
$configuration->set ( 'file system tree', require configuration_path ( ) . '/file system/tree.php' );