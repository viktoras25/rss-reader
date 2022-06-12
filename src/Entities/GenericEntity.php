<?php

namespace Viktoras\RssReader\Entities;

class GenericEntity extends AbstractEntity
{
    public function __toString()
    {
        return (string) $this->xml;
    }
}
