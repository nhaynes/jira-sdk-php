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

class IssueMatches
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var IssueMatchesForJQL[]
     */
    protected $matches;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return IssueMatchesForJQL[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param IssueMatchesForJQL[] $matches
     */
    public function setMatches(array $matches): self
    {
        $this->initialized['matches'] = true;
        $this->matches = $matches;

        return $this;
    }
}
