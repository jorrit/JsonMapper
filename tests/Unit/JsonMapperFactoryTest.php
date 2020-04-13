<?php

declare(strict_types=1);

namespace JsonMapper\Tests\Unit;

use JsonMapper\Handler\PropertyMapper;
use JsonMapper\JsonMapper;
use JsonMapper\JsonMapperFactory;
use JsonMapper\Middleware\DocBlockAnnotations;
use PHPUnit\Framework\TestCase;

class JsonMapperFactoryTest extends TestCase
{
    /**
     * @covers \JsonMapper\JsonMapperFactory
     */
    public function testCanCreateCustomMapper(): void
    {
        $factory = new JsonMapperFactory();
        $propertyMapper = new PropertyMapper();
        $docBlockMiddleware = new DocBlockAnnotations();

        $mapper = $factory->create($propertyMapper, $docBlockMiddleware);

        self::assertInstanceOf(JsonMapper::class, $mapper);
    }

    /**
     * @covers \JsonMapper\JsonMapperFactory
     */
    public function testCanCreateDefaultMapper(): void
    {
        $factory = new JsonMapperFactory();

        $mapper = $factory->default();

        self::assertInstanceOf(JsonMapper::class, $mapper);
    }

    /**
     * @covers \JsonMapper\JsonMapperFactory
     */
    public function testCanCreateBestFitMapper(): void
    {
        $factory = new JsonMapperFactory();

        $mapper = $factory->bestFit();

        self::assertInstanceOf(JsonMapper::class, $mapper);
    }
}
