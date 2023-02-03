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

class AutoCompleteSuggestions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of suggested item.
     *
     * @var AutoCompleteSuggestion[]
     */
    protected $results;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of suggested item.
     *
     * @return AutoCompleteSuggestion[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * The list of suggested item.
     *
     * @param AutoCompleteSuggestion[] $results
     */
    public function setResults(array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;

        return $this;
    }
}
