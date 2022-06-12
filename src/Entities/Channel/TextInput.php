<?php

namespace Viktoras\RssReader\Entities\Channel;

use Viktoras\RssReader\Entities\AbstractEntity;
use Viktoras\RssReader\Exceptions\RequiredElementMissing;

class TextInput extends AbstractEntity
{
    /**
     * The label of the Submit button in the text input area. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getTitle(): string
    {
        return $this->getRequiredStringNode('title');
    }

    /**
     * Explains the text input area. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getDescription(): string
    {
        return $this->getRequiredStringNode('description');
    }

    /**
     * The name of the text object in the text input area. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getName(): string
    {
        return $this->getRequiredStringNode('name');
    }

    /**
     * The URL of the CGI script that processes text input requests. Required.
     *
     * @throws RequiredElementMissing
     */
    public function getLink(): string
    {
        return $this->getRequiredStringNode('link');
    }
}
