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

class JQLPersonalDataMigrationRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of queries with user identifiers. Maximum of 100 queries.
     *
     * @var string[]
     */
    protected $queryStrings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of queries with user identifiers. Maximum of 100 queries.
     *
     * @return string[]
     */
    public function getQueryStrings(): array
    {
        return $this->queryStrings;
    }

    /**
     * A list of queries with user identifiers. Maximum of 100 queries.
     *
     * @param string[] $queryStrings
     */
    public function setQueryStrings(array $queryStrings): self
    {
        $this->initialized['queryStrings'] = true;
        $this->queryStrings = $queryStrings;

        return $this;
    }
}
