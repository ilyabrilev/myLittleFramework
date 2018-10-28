<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 28.10.2018
 * Time: 20:04
 */
use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase {

    public function test_db_config_is_array() {
        $allDbConf = \Core\Configuration::getDB();
        $this->assertInternalType('array', $allDbConf);
    }

}