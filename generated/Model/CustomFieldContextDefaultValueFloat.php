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

class CustomFieldContextDefaultValueFloat extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The default floating-point number.
     *
     * @var float
     */
    protected $number;
    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The default floating-point number.
     */
    public function getNumber(): float
    {
        return $this->number;
    }

    /**
     * The default floating-point number.
     */
    public function setNumber(float $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;

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
