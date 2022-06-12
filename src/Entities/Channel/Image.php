<?php

namespace Viktoras\RssReader\Entities\Channel;

use Viktoras\RssReader\Entities\AbstractEntity;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

class Image extends AbstractEntity
{
    /**
     * URL of a GIF, JPEG or PNG image that represents the channel. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getUrl(): string
    {
        return $this->getRequiredStringNode('url');
    }

    /**
     * Describes the image, it's used in the ALT attribute of the HTML. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getTitle(): string
    {
        return $this->getRequiredStringNode('title');
    }

    /**
     * URL of the site, when the channel is rendered, the image is a link to the site. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getLink(): string
    {
        return $this->getRequiredStringNode('link');
    }

    /**
     * Optional.
     */
    public function getWidth(): string
    {
        return $this->getStringElement('width');
    }

    /**
     * Optional.
     */
    public function getHeight(): string
    {
        return $this->getStringElement('height');
    }

    /**
     * Contains text that is included in the TITLE attribute of the link formed around the image.
     * Optional.
     */
    public function getDescription(): string
    {
        return $this->getStringElement('description');
    }
}
