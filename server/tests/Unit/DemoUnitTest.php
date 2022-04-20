<?php

test('create a demo object', function () {
    // arrange

    // act
    $demo = new Packages\Demo\Feature\Demos\Demo\Demo("hamster");

    // assert
    expect($demo)->not->toBeNull();
    expect($demo->getName())->toBe("hamster");
});

test('demo should generate a uuid', function() {
    // arrange
    $demo = new Packages\Demo\Feature\Demos\Demo\Demo("uuid");

    // act
    $uuid = $demo->generateUuid();

    // assert
    expect($uuid)->not->toBeEmpty();
    expect($uuid)->toMatch("/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[089ab][0-9a-f]{3}-[0-9a-f]{12}$/i");
});

