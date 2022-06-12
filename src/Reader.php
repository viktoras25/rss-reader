<?php

declare(strict_types=1);

namespace Viktoras\RssReader;

use Exception as BaseException;
use SimpleXMLElement;
use Viktoras\RssReader\Entities\RSS;

class Reader
{
    private SimpleXMLElement $xml;

    /**
     * @throws Exceptions\InvalidXml|Exceptions\UnsupportedInput
     */
    public function __construct($xml = null)
    {
        if (is_string($xml)) {
            try {
                $this->xml = new SimpleXMLElement($xml);
            } catch (BaseException $e) {
                throw new Exceptions\InvalidXml($e->getMessage());
            }

            return;
        }

        if ($xml instanceof SimpleXMLElement) {
            $this->xml = $xml;

            return;
        }

        throw new Exceptions\UnsupportedInput('Provided input can not be processed as RSS');
    }

    public function getXml(): SimpleXMLElement
    {
        return $this->xml;
    }

    /**
     * @throws Exceptions\RequiredElementMissing
     */
    public function getRSS(): RSS
    {
        if (strtolower($this->xml->getName()) !== 'rss') {
            throw new Exceptions\RequiredElementMissing('Missing required <rss> element');
        }

        return new RSS($this->xml);
    }

    public function getChannel(): Entities\Channel
    {
        return $this->getRSS()->getChannel();
    }

    /**
     * @return Entities\Item[]
     */
    public function getItems(): array
    {
        return $this->getChannel()->getItems();
    }
}
