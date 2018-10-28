<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 28.10.2018
 * Time: 20:44
 */

use PHPUnit\Framework\TestCase;

class DBConnectionTest extends TestCase {

    public function test_db_connection_successfully_created() {
        $conf = ['default' => [
            'host_type' => 'mysql:host',
            'host'      => '127.0.0.1',
            'dbname'    => 'framework_test',
            'user'      => 'fm_user',
            'pass'      => '12345'
        ]];
        $conn = \Core\DBConnection::GetInstance('default', $conf);
        $this->assertInstanceOf(\Core\DBConnection::class, $conn);
        $this->assertTrue($conn->GetIfPdoClassCreated());

        $conn2 = \Core\DBConnection::GetInstance('default', $conf);
        $this->assertEquals($conn, $conn2);
    }

    public function test_missing_connection_in_conf() {
        $conf = ['1231212312' => [
            'host_type' => 'mysql:host',
            'host'      => '127.0.0.1',
            'dbname'    => 'framework_test',
            'user'      => 'fm_user',
            'pass'      => '12345'
        ]];
        try {
            \Core\DBConnection::GetInstance('adfsdadfase', $conf);
        }
        catch (\Exception $e) {
            $this->assertInstanceOf(\Core\Exceptions\DBConnectionException::class, $e);
            return;
        }
        $this->fail('DBConnectionException was not throwed');
    }

}