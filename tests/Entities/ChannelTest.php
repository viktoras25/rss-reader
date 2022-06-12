<?php

namespace Viktoras\RssReader\Tests\Entities;

use Viktoras\RssReader\Tests\ReaderTrait;

uses(ReaderTrait::class);

it('reads channel properties', function (string $filename) {
    $channel = $this->getRSS($filename)->getChannel();

    $this->assertSame('Liftoff News', $channel->getTitle());
    $this->assertSame('http://liftoff.msfc.nasa.gov/', $channel->getLink());
    $this->assertSame('Liftoff to Space Exploration.', $channel->getDescription());
    $this->assertSame([], $channel->getItems());
    $this->assertSame('en-us', $channel->getLanguage());
    $this->assertSame('', $channel->getCopyright());
    $this->assertSame('editor@example.com', $channel->getManagingEditor());
    $this->assertSame('webmaster@example.com', $channel->getWebMaster());
    $this->assertSame('2003-06-10T04:00:00+00:00', $channel->getPubDate()->format('c'));
    $this->assertSame('2003-06-10T09:41:01+00:00', $channel->getLastBuildDate()->format('c'));
    $this->assertSame([], $channel->getCategories());
    $this->assertSame('Weblog Editor 2.0', $channel->getGenerator());
    $this->assertSame('http://blogs.law.harvard.edu/tech/rss', $channel->getDocs());
    $this->assertNull($channel->getCloud());
    $this->assertSame(0, $channel->getTtl());
    $this->assertNull($channel->getImage());
    $this->assertSame('', $channel->getRating());
    $this->assertSame('', $channel->getTextInput());
    $this->assertSame([], $channel->getSkipHours());
    $this->assertSame([], $channel->getSkipDays());
})->with(['nasa-liftoff-2.0.xml']);
