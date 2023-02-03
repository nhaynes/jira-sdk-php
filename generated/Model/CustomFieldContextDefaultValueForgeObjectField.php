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

class CustomFieldContextDefaultValueForgeObjectField extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The default JSON object.
     *
     * @var mixed[]
     */
    protected $object;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The default JSON object.
     *
     * @return mixed[]
     */
    public function getObject(): iterable
    {
        return $this->object;
    }

    /**
     * The default JSON object.
     *
     * @param mixed[] $object
     */
    public function setObject(iterable $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;

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
