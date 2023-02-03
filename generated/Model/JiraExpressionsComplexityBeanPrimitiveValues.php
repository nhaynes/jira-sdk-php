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

class JiraExpressionsComplexityBeanPrimitiveValues extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The complexity value of the current expression.
     *
     * @var int
     */
    protected $value;
    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     *
     * @var int
     */
    protected $limit;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The complexity value of the current expression.
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * The complexity value of the current expression.
     */
    public function setValue(int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     */
    public function setLimit(int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }
}
