<?php

use Core\Container;

test('example', function () {
    expect(true)->toBeTrue();
});

test('bind and resolve', function () {
    $container = new Container();

    $container->bind('example', function () {
        return 'example_value';
    });

    $resolved = $container->resolve('example');

    expect($resolved)->toBe('example_value');
});

test('resolve throws exception for unbound key', function () {
    $container = new Container();

    expect(fn() => $container->resolve('unbound_key'))
        ->toThrow(Exception::class, 'No Matching found for your key unbound_key');
});
