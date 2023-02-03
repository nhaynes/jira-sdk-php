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

class JQLQueryWithUnknownUsers
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The original query, for reference.
     *
     * @var string
     */
    protected $originalQuery;
    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found.
     *
     * @var string
     */
    protected $convertedQuery;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The original query, for reference.
     */
    public function getOriginalQuery(): string
    {
        return $this->originalQuery;
    }

    /**
     * The original query, for reference.
     */
    public function setOriginalQuery(string $originalQuery): self
    {
        $this->initialized['originalQuery'] = true;
        $this->originalQuery = $originalQuery;

        return $this;
    }

    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found.
     */
    public function getConvertedQuery(): string
    {
        return $this->convertedQuery;
    }

    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found.
     */
    public function setConvertedQuery(string $convertedQuery): self
    {
        $this->initialized['convertedQuery'] = true;
        $this->convertedQuery = $convertedQuery;

        return $this;
    }
}
