<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 28.10.2018
 * Time: 18:09
 */
use PHPUnit\Framework\TestCase;
use \Core\Router;

final class RouterTests extends TestCase {

    public function test_index_get_success() {
        $router = new Router([]);
        $router->Get('', 'Index@Get');
        $server = \Core\Request::GetMockServerArray();
        $request = \Core\Request::Mock($server, []);
        $response = $router->Proceed($request);
        $this->assertInstanceOf(\Core\Responses\Response::class, $response);
        $this->assertEquals(200, $response->GetStatusCode());
    }

    public function test_get_section_not_found_fail() {
        $router = new Router([]);
        $router->Get('', 'Index@Get');
        $server = \Core\Request::GetMockServerArray();
        $server['REQUEST_METHOD'] = 'adasdasdasdas';
        $request = \Core\Request::Mock($server, []);
        $response = $router->Proceed($request);
        $this->assertInstanceOf(\Core\Responses\Response::class, $response);
        $this->assertEquals(404, $response->GetStatusCode());
    }

    public function test_get_gibberish_fail() {
        $router = new Router([]);
        $router->Get('', 'aasdfasdfasdf');
        $server = \Core\Request::GetMockServerArray();
        $request = \Core\Request::Mock($server, []);
        $response = $router->Proceed($request);
        $this->assertInstanceOf(\Core\Responses\Response::class, $response);
        $this->assertEquals(404, $response->GetStatusCode());
    }

    public function test_route_not_found_fail() {
        $router = new Router([]);
        $router->Get('', 'Index@Get');
        $server = \Core\Request::GetMockServerArray();
        $server['REQUEST_URI'] = 'laijsdhas';
        $request = \Core\Request::Mock($server, []);
        $response = $router->Proceed($request);
        $this->assertInstanceOf(\Core\Responses\Response::class, $response);
        $this->assertEquals(404, $response->GetStatusCode());
    }


    private function comment($str) {
        fwrite(STDERR, print_r($str, TRUE));
    }
}