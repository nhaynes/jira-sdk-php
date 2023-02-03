<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class CustomFieldContextDefaultValueReadOnly extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The default text. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The default text. The maximum length is 255 characters.
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * The default text. The maximum length is 255 characters.
     */
    public function setText(string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
