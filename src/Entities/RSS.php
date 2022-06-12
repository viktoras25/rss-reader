<?php

declare(strict_types=1);

namespace Viktoras\RssReader\Entities;

use Viktoras\RssReader\Exceptions\InvalidClass;
use Viktoras\RssReader\Exceptions\RequiredAttributeMissing;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

/**
 * At the top level, a RSS document is a <rss> element, with a mandatory attribute
 * called version, that specifies the version of RSS that the document conforms to.
 * If it conforms to this specification, the version attribute must be 2.0.
 */
class RSS extends AbstractEntity
{
    /**
     * @throws RequiredAttributeMissing
     */
    public function getVersion(): string
    {
        return $this->getStringAttribute('version', true);
    }

    /**
     * @return Channel
     *
     * @throws RequiredElementMissing|InvalidClass
     */
    public function getChannel(): Channel
    {
        /** @var ?Channel $channel */
        $channel = $this->getObjectElement('channel', Channel::class);

        if (null === $channel) {
            throw new RequiredElementMissing('Required element <channel> is missing');
        }

        return $channel;
    }
}
