<?php

namespace Yumerov\CredowebBackendTask\Response;
use PHPUnit\Framework\TestCase;

class ResponseHandlerTest extends TestCase {

    public function testHandle()
    {
        // Arrange
        $response = new Response(['message' => 'Not found'], 404);
        $hander = new ResponseHandler();

        // Act
        ob_start();
        $hander->handle($response);
        $output = ob_get_contents();
        ob_end_flush();

        //Assert
        $this->assertEquals('{"message":"Not found"}', $output);
    }
}