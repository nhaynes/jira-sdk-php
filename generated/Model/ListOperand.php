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

class ListOperand extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of operand values.
     *
     * @var mixed[][]
     */
    protected $values;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of operand values.
     *
     * @return mixed[][]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * The list of operand values.
     *
     * @param mixed[][] $values
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }
}
