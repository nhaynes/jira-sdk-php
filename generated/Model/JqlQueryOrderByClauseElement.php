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

class JqlQueryOrderByClauseElement
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @var JqlQueryField
     */
    protected $field;
    /**
     * The direction in which to order the results.
     *
     * @var string
     */
    protected $direction;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     */
    public function getField(): JqlQueryField
    {
        return $this->field;
    }

    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     */
    public function setField(JqlQueryField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;

        return $this;
    }

    /**
     * The direction in which to order the results.
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * The direction in which to order the results.
     */
    public function setDirection(string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;

        return $this;
    }
}
