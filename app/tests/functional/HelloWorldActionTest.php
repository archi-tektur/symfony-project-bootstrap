<?php

declare(strict_types=1);

namespace App\Tests\functional;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\CurlHttpClient;

/**
 * @internal
 * @coversNothing
 */
final class HelloWorldActionTest extends TestCase
{
    private CurlHttpClient $httpClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->httpClient = new CurlHttpClient();
    }

    public function testHelloWorldResponse(): void
    {
        $response = $this->httpClient->request('GET', 'http://localhost:8080/api/hello-world');

        $data = $response->toArray();

        self::assertArrayHasKey('message', $data);
        self::assertSame('Hello, world', $data['message']);
    }
}
