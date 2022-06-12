<?php

namespace Viktoras\RssReader\Tests\Entities;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\RSS;
use Viktoras\RssReader\Exceptions\RequiredAttributeMissing;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;
use Viktoras\RssReader\Tests\ReaderTrait;

uses(ReaderTrait::class);

it('can read RSS version', function (string $expectedVersion, string $filename) {
    $this->assertSame($expectedVersion, $this->getRSS($filename)->getVersion());
})->with(
    [
        ['2.0', 'nasa-liftoff-2.0.xml'],
        ['0.92', 'radio-userland-0.92.xml'],
        ['0.91', 'write-the-web-0.91.xml'],
    ]
);

it('throws exception on missing version', function () {
    $this->expectException(RequiredAttributeMissing::class);
    $this->expectExceptionMessage('Required attribute "version" is missing');

    $rss = new RSS(new SimpleXMLElement('<rss/>'));
    $rss->getVersion();
});

it('can retrieve channel', function (string $filename) {
    $this->assertIsObject($this->getRSS($filename)->getChannel());
})->with(
    [
        ['nasa-liftoff-2.0.xml'],
        ['radio-userland-0.92.xml'],
        ['write-the-web-0.91.xml'],
    ]
);

it('throws exception on missing channel', function () {
    $this->expectException(RequiredElementMissing::class);
    $this->expectExceptionMessage('Required element <channel> is missing');

    $rss = new RSS(new SimpleXMLElement('<rss/>'));
    $rss->getChannel();
});
