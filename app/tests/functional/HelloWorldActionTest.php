<?php

declare(strict_types=1);

namespace App\Tests\functional;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @internal
 * @coversNothing
 */
final class HelloWorldActionTest extends TestCase
{
    private HttpClientInterface $httpClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->httpClient = HttpClient::create();
    }

    public function testHelloWorldResponse(): void
    {
        $response = $this->httpClient->request('GET', 'http://app:8080/api/hello-world');

        $data = $response->toArray();

        self::assertArrayHasKey('message', $data);
        self::assertSame('Hello, world', $data['message']);
    }
}
