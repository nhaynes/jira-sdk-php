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

class JsonContextVariable extends CustomContextVariable
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A JSON object containing custom content.
     *
     * @var mixed[]
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A JSON object containing custom content.
     *
     * @return mixed[]
     */
    public function getValue(): iterable
    {
        return $this->value;
    }

    /**
     * A JSON object containing custom content.
     *
     * @param mixed[] $value
     */
    public function setValue(iterable $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
