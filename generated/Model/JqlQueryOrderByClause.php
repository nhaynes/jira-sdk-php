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

class JqlQueryOrderByClause
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of order-by clause fields and their ordering directives.
     *
     * @var JqlQueryOrderByClauseElement[]
     */
    protected $fields;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of order-by clause fields and their ordering directives.
     *
     * @return JqlQueryOrderByClauseElement[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * The list of order-by clause fields and their ordering directives.
     *
     * @param JqlQueryOrderByClauseElement[] $fields
     */
    public function setFields(array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }
}
