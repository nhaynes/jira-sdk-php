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

class JqlQueriesToParse
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of queries to parse.
     *
     * @var string[]
     */
    protected $queries;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of queries to parse.
     *
     * @return string[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }

    /**
     * A list of queries to parse.
     *
     * @param string[] $queries
     */
    public function setQueries(array $queries): self
    {
        $this->initialized['queries'] = true;
        $this->queries = $queries;

        return $this;
    }
}
