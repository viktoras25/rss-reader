<?php

declare(strict_types=1);

namespace Viktoras\RssReader\Entities;

use DateTimeInterface;
use Viktoras\RssReader\Entities\Channel\Cloud;
use Viktoras\RssReader\Entities\Channel\Image;
use Viktoras\RssReader\Exceptions\InvalidDateFormat;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

/**
 * Subordinate to the <rss> element is a single <channel> element, which contains
 * information about the channel (metadata) and its contents.
 */
class Channel extends AbstractEntity
{
    /**
     * The name of the channel. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getTitle(): string
    {
        return $this->getRequiredStringNode('title');
    }

    /**
     * The URL to the HTML website corresponding to the channel. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getLink(): string
    {
        return $this->getRequiredStringNode('link');
    }

    /**
     * Phrase or sentence describing the channel. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getDescription(): string
    {
        return $this->getRequiredStringNode('description');
    }

    /**
     * The language the channel is written in. Optional.
     *
     * @see https://www.rssboard.org/rss-language-codes
     */
    public function getLanguage(): string
    {
        return $this->getStringElement('language');
    }

    /**
     * Copyright notice for content in the channel. Optional.
     */
    public function getCopyright(): string
    {
        return $this->getStringElement('copyright');
    }

    /**
     * Email address for person responsible for editorial content. Optional.
     */
    public function getManagingEditor(): string
    {
        return $this->getStringElement('managingEditor');
    }

    /**
     * Email address for person responsible for technical issues relating to channel. Optional.
     */
    public function getWebMaster(): string
    {
        return $this->getStringElement('webMaster');
    }

    /**
     * The publication date for the content in the channel. Optional.
     *
     * @throws InvalidDateFormat
     */
    public function getPubDate(): ?DateTimeInterface
    {
        return $this->getDateElement('pubDate');
    }

    /**
     * The last time the content of the channel changed. Optional.
     *
     * @throws InvalidDateFormat
     */
    public function getLastBuildDate(): ?DateTimeInterface
    {
        return $this->getDateElement('lastBuildDate');
    }

    /**
     * Specify one or more categories that the channel belongs to. Optional.
     *
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->getObjectElements('category', Category::class);
    }

    /**
     * A string indicating the program used to generate the channel. Optional.
     */
    public function getGenerator(): string
    {
        return $this->getStringElement('generator');
    }

    /**
     * A URL that points to the documentation for the format used in the RSS file. Optional.
     */
    public function getDocs(): string
    {
        return $this->getStringElement('docs');
    }

    /**
     * Allows processes to register with a cloud to be notified of updates to the channel,
     * implementing a lightweight publish-subscribe protocol for RSS feeds. Optional.
     *
     * @return ?Cloud
     */
    public function getCloud(): ?object
    {
        return $this->getObjectElement('cloud', Cloud::class);
    }

    /**
     * ttl stands for time to live. It's a number of minutes that indicates
     * how long a channel can be cached before refreshing from the source. Optional.
     */
    public function getTtl(): int
    {
        return $this->getIntElement('ttl');
    }

    /**
     * Specifies a GIF, JPEG or PNG image that can be displayed with the channel. Optional.
     *
     * @return ?Image
     */
    public function getImage(): ?object
    {
        return $this->getObjectElement('image', Image::class);
    }

    /**
     * The PICS rating for the channel. Optional.
     *
     * @see http://www.w3.org/PICS/
     */
    public function getRating(): string
    {
        return $this->getStringElement('rating');
    }

    /**
     * Specifies a text input box that can be displayed with the channel. Optional.
     */
    public function getTextInput(): string
    {
        return $this->getStringElement('textInput');
    }

    /**
     * A hint for aggregators telling them which hours they can skip. Optional.
     */
    public function getSkipHours(): array
    {
        $skipHours = $this->getElement('skipHours');
        if (null === $skipHours) {
            return [];
        }

        return $skipHours->mapNodes('hour', fn ($value) => strval($value));
    }

    /**
     * A hint for aggregators telling them which days they can skip. Optional.
     */
    public function getSkipDays(): array
    {
        $skipDays = $this->getElement('skipDays');
        if (null === $skipDays) {
            return [];
        }

        return $skipDays->mapNodes('day', fn ($value) => strval($value));
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->getObjectElements('item', Item::class);
    }
}
