<?php

namespace Viktoras\RssReader\Tests\Entities;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\Category;

it('can be converted to string', function () {
    $category = new Category(new SimpleXMLElement('<category domain="https://google.com">test</category>'));

    $this->assertSame('test', (string) $category);
    $this->assertSame('test', $category->getValue());
    $this->assertSame('https://google.com', $category->getDomain());
});
