<?php

namespace Viktoras\RssReader\Entities\Channel;

use Viktoras\RssReader\Entities\AbstractEntity;

class Category extends AbstractEntity
{
    public function getDomain(): string
    {
        return $this->getStringAttribute('domain');
    }

    public function getValue(): string
    {
        return strval($this->xml);
    }
}
