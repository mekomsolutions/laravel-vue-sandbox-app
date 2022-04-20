<?php

test('create a demo object', function () {
    // arrange

    // act
    $demo = new Packages\Demo\Feature\Demos\Demo\Demo("hamster");

    // assert
    expect($demo)->not->toBeNull();
    expect($demo->getName())->toBe("hamster");
});
