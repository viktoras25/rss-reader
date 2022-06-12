<?php

namespace Viktoras\RssReader\Entities\Channel;

use Viktoras\RssReader\Entities\AbstractEntity;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

class Enclosure extends AbstractEntity
{
    public function getURL(): string
    {
        return $this->getStringAttribute('url');
    }

    public function getLength(): string
    {
        return $this->getStringAttribute('length');
    }

    public function getType(): string
    {
        return $this->getStringAttribute('type');
    }
}
