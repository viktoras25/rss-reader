<?php

namespace Viktoras\RssReader\Tests\Entities\Channel;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\Channel\Image;

it('can retrieve values', function () {
    $xml = new SimpleXMLElement(
        '<image>
            <url>domain.com</url>
            <title>picture</title>
            <link>img.jpg</link>
            <width>100</width>
            <height>200</height>
            <description>no description</description>
        </image>'
    );

    $cloud = new Image($xml);

    $this->assertSame('domain.com', $cloud->getUrl());
    $this->assertSame('picture', $cloud->getTitle());
    $this->assertSame('img.jpg', $cloud->getLink());
    $this->assertSame('100', $cloud->getWidth());
    $this->assertSame('200', $cloud->getHeight());
    $this->assertSame('no description', $cloud->getDescription());
});
