<?php

beforeEach(function () {
    $this->instance = new \App\Services\UuidV5();
});

test('should create a valid v5 uuid', function($namespace, $name, $expected) {
    // arrange

    // act
    $result = $this->instance->generateUuid($namespace, $name);

    // assert
    expect($result)->not->toBeEmpty();
    expect($result)->toBe($expected);
})->with([
    ["0d1b340a-4f63-426d-8954-b25f88e5eb2d", "hamsters", "3f00beea-67a3-5eb5-baa2-761f1678d88e"],
    ["0d1b340a-4f63-426d-8954-b25f88e5eb2d", "kangaroos", "5afa8cef-4bc3-5b5d-9398-5cca407f79bb"],
]);

test('should throw an exception if namespace is not a UUID', function () {
    // arrange

    // act
    $this->instance->generateUuid("a123", "hamsters");

    // assert
})->throws(Exception::class, "invalid namespace");
