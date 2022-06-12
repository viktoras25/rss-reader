<?php

namespace Viktoras\RssReader\Entities;

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

    public function __toString()
    {
        return $this->getValue();
    }
}
