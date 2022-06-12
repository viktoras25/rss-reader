<?php

namespace Viktoras\RssReader\Tests\Entities;

use SimpleXMLElement;
use Viktoras\RssReader\Entities\GenericEntity;

it('can be converted to string', function () {
    $entity = new GenericEntity(new SimpleXMLElement('<xml>contents</xml>'));

    $this->assertSame('contents', (string) $entity);
});
