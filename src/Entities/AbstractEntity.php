<?php

declare(strict_types=1);

namespace Viktoras\RssReader\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use Exception as BaseException;
use SimpleXMLElement;
use Viktoras\RssReader\Exceptions\InvalidDateFormat;
use Viktoras\RssReader\Exceptions\RequiredAttributeMissing;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

abstract class AbstractEntity
{
    protected SimpleXMLElement $xml;

    public function __construct(SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }

    /**
     * @throws RequiredAttributeMissing
     */
    protected function getStringAttribute(string $attributeName, bool $required = false): string
    {
        if (!isset($this->xml[$attributeName])) {
            if ($required) {
                throw new RequiredAttributeMissing(sprintf('Required attribute "%s" is missing', $attributeName));
            }

            return '';
        }

        return strval($this->xml[$attributeName]);
    }

    protected function getElement(string $nodeName): ?GenericEntity
    {
        if (!isset($this->xml->$nodeName)) {
            return null;
        }

        return new GenericEntity($this->xml->$nodeName);
    }

    protected function getStringElement(string $nodeName): string
    {
        return strval($this->getElement($nodeName));
    }

    protected function getDateElement(string $nodeName): ?DateTimeInterface
    {
        if (!isset($this->xml->$nodeName)) {
            return null;
        }

        try {
            return new DateTimeImmutable($this->getStringElement($nodeName));
        } catch (BaseException $e) {
            throw new InvalidDateFormat();
        }
    }

    protected function getIntElement(string $nodeName): int
    {
        return intval($this->getElement($nodeName));
    }

    protected function getObjectElement(string $nodeName, string $className): ?object
    {
        $nodes = $this->getObjectElements($nodeName, $className);

        return current($nodes) ?: null;
    }

    protected function getObjectElements(string $nodeName, string $className): array
    {
        return $this->mapNodes($nodeName, fn ($node) => new $className($node));
    }

    protected function mapNodes(string $nodeName, callable $callback): array
    {
        if (!isset($this->xml->$nodeName)) {
            return [];
        }

        $nodes = [];

        foreach ($this->xml->$nodeName as $node) {
            $nodes[] = $callback($node);
        }

        return $nodes;
    }

    /**
     * @throws RequiredElementMissing
     */
    protected function getRequiredStringNode(string $nodeName): string
    {
        $this->checkRequiredElement($nodeName);

        return $this->getStringElement($nodeName);
    }

    /**
     * @throws RequiredElementMissing
     */
    protected function checkRequiredElement(string $nodeName): void
    {
        if (!isset($this->xml->$nodeName)) {
            throw new RequiredElementMissing(sprintf('Required element "%s" is missing', $nodeName));
        }
    }
}
