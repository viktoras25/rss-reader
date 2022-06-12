<?php

namespace Viktoras\RssReader\Tests;

use Viktoras\RssReader\Entities\RSS;
use Viktoras\RssReader\Reader;

trait ReaderTrait
{
    protected function getRSS(string $filename): RSS
    {
        return (new Reader(file_get_contents(__DIR__ . '/_files/feeds/' . $filename)))->getRSS();
    }
}
