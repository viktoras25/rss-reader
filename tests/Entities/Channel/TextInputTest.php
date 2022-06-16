<?php

namespace Viktoras\RssReader\Tests\Entities\Channel;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\Channel\TextInput;

it('can retrieve values', function () {
    $xml = new SimpleXMLElement(
        '<textInput>
            <title>text input</title>
            <description>no description</description>
            <name>AAA</name>
            <link>aaa.txt</link>
        </textInput>'
    );

    $cloud = new TextInput($xml);

    $this->assertSame('text input', $cloud->getTitle());
    $this->assertSame('no description', $cloud->getDescription());
    $this->assertSame('AAA', $cloud->getName());
    $this->assertSame('aaa.txt', $cloud->getLink());
});
