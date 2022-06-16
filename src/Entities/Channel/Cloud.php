<?php

namespace Viktoras\RssReader\Entities\Channel;

use Viktoras\RssReader\Entities\AbstractEntity;

class Cloud extends AbstractEntity
{
    public function getDomain(): string
    {
        return $this->getStringAttribute('domain');
    }

    public function getPort(): string
    {
        return $this->getStringAttribute('port');
    }

    public function getPath(): string
    {
        return $this->getStringAttribute('path');
    }

    public function getRegisterProcedure(): string
    {
        return $this->getStringAttribute('registerProcedure');
    }

    public function getProtocol(): string
    {
        return $this->getStringAttribute('protocol');
    }
}
