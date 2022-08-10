<?php

declare(strict_types=1);

namespace App\Tests\functional;

use App\Tests\functional\helper\HttpClientAwareTestCase;

/**
 * @covers \App\Controller\HelloWorldAction
 *
 * @internal
 */
final class HelloWorldActionTest extends HttpClientAwareTestCase
{
    public function testHelloWorldResponse(): void
    {
        $response = $this->httpClient->request('GET', '/api/hello-world');
        $data = $response->toArray();

        self::assertArrayHasKey('message', $data);
        self::assertSame('Hello, world', $data['message']);
    }
}
