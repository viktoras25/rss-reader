<?php

namespace Viktoras\RssReader\Tests\Entities;

use Viktoras\RssReader\Tests\ReaderTrait;

uses(ReaderTrait::class);

it('reads channel properties', function (string $filename) {
    $items = $this->getRSS($filename)->getChannel()->getItems();

    [$item1] = $items;

    $this->assertSame('Star City', $item1->getTitle());
    $this->assertSame('http://liftoff.msfc.nasa.gov/news/2003/news-starcity.asp', $item1->getLink());
    $this->assertSame('How do Americans get', substr($item1->getDescription(), 0, 20));
    $this->assertSame('', $item1->getAuthor());
    $this->assertSame([], $item1->getCategories());
    $this->assertSame('', $item1->getComments());
    $this->assertSame(null, $item1->getEnclosure());
    $this->assertSame('http://liftoff.msfc.nasa.gov/2003/06/03.html#item573', $item1->getGuid());
    $this->assertSame('2003-06-03T09:39:21+00:00', $item1->getPubDate()->format('c'));
    $this->assertSame('', $item1->getSource());
})->with(['nasa-liftoff-2.0.xml']);
