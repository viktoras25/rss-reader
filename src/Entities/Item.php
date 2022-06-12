<?php

namespace Viktoras\RssReader\Entities;

use DateTimeInterface;
use Viktoras\RssReader\Entities\Channel\Item\Enclosure;

/**
 * A channel may contain any number of <item>s. An item may represent a "story"
 * -- much like a story in a newspaper or magazine; if so its description is a
 * synopsis of the story, and the link points to the full story.
 */
class Item extends AbstractEntity
{
    /**
     * The title of the item. Optional.
     */
    public function getTitle(): string
    {
        return $this->getStringElement('title');
    }

    /**
     * The URL of the item. Optional.
     */
    public function getLink(): string
    {
        return $this->getStringElement('link');
    }

    /**
     * The item synopsis. Optional.
     */
    public function getDescription(): string
    {
        return $this->getStringElement('description');
    }

    /**
     * Email address of the author of the item. Optional.
     */
    public function getAuthor(): string
    {
        return $this->getStringElement('author');
    }

    /**
     * Includes the item in one or more categories. Optional.
     *
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->getObjectElements('category', Category::class);
    }

    /**
     * URL of a page for comments relating to the item. Optional.
     */
    public function getComments(): string
    {
        return $this->getStringElement('comments');
    }

    /**
     * Describes a media object that is attached to the item. Optional.
     *
     * @return ?Enclosure
     */
    public function getEnclosure(): ?object
    {
        return $this->getObjectElement('enclosure', Enclosure::class);
    }

    /**
     * A string that uniquely identifies the item. When present, an aggregator
     * may choose to use this string to determine if an item is new. Optional.
     */
    public function getGuid(): string
    {
        return $this->getStringElement('guid');
    }

    /**
     * Indicates when the item was published. Optional.
     */
    public function getPubDate(): ?DateTimeInterface
    {
        return $this->getDateElement('pubDate');
    }

    /**
     * The RSS channel that the item came from. Optional.
     */
    public function getSource(): string
    {
        return $this->getStringElement('source');
    }
}
