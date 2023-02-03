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

class CustomFieldContextDefaultValueForgeMultiStringField extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @var string[]
     */
    protected $values;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @param string[] $values
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

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
