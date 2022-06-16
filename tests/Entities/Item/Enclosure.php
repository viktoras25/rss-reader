<?php

namespace Viktoras\RssReader\Tests\Entities\Channel;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\Item\Enclosure;

it('can retrieve values', function () {
    $xml = new SimpleXMLElement(
        '<enclosure url="http://www.scripting.com/mp3s/weatherReportSuite.mp3" length="12216320" type="audio/mpeg" />'
    );

    $enclosure = new Enclosure($xml);

    $this->assertSame('http://www.scripting.com/mp3s/weatherReportSuite.mp3', $enclosure->getURL());
    $this->assertSame('12216320', $enclosure->getLength());
    $this->assertSame('audio/mpeg', $enclosure->getType());
});
