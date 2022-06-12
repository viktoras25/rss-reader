<?php

namespace Viktoras\RssReader\Entities;

use SimpleXMLElement;

interface EntityInterface
{
    public function __construct(SimpleXMLElement $xml);
}
