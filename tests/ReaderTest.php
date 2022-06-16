<?php

namespace Viktoras\RssReader\Tests;

use SimpleXMLElement;
use Viktoras\RssReader\Exceptions\InvalidRss;
use Viktoras\RssReader\Exceptions\InvalidXml;
use Viktoras\RssReader\Exceptions\UnsupportedInput;
use Viktoras\RssReader\Reader;

dataset('feeds', [
    'liftoff-2.0'         => file_get_contents(__DIR__ . '/_files/feeds/nasa-liftoff-2.0.xml'),
    'radio-userland-0.92' => file_get_contents(__DIR__ . '/_files/feeds/radio-userland-0.92.xml'),
    'write-the-web-0.91'  => file_get_contents(__DIR__ . '/_files/feeds/write-the-web-0.91.xml'),
]);

it('fails on unsupported input type', fn () => new Reader(1))
    ->throws(UnsupportedInput::class, 'Provided input can not be processed as RSS');

it('fails on invalid XML', fn () => new Reader('<invalid'))
    ->throws(InvalidXml::class, 'String could not be parsed as XML');

it('can initialize reader with a string', function ($string) {
    $reader = new Reader($string);

    $this->assertIsObject($reader->getRSS());
})->with('feeds');

it('can initialize reader with a SimpleXMLElement', function ($string) {
    $reader = new Reader(new SimpleXMLElement($string));

    $this->assertIsObject($reader->getRSS());
})->with('feeds');

it('fails on invalid RSS', fn () => (new Reader('<notrss/>'))->getRSS())
    ->throws(InvalidRss::class, 'Missing required <rss> element');

it('can fetch channel from rss', function ($string) {
    $reader = new Reader($string);

    $this->assertEquals($reader->getRSS()->getChannel(), $reader->getChannel());
})->with('feeds');

it('can fetch items from rss', function ($string) {
    $reader = new Reader($string);

    $this->assertEquals($reader->getRSS()->getChannel()->getItems(), $reader->getItems());
})->with('feeds');
