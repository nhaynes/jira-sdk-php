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

class JiraExpressionsAnalysis
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The results of Jira expressions analysis.
     *
     * @var JiraExpressionAnalysis[]
     */
    protected $results;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The results of Jira expressions analysis.
     *
     * @return JiraExpressionAnalysis[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * The results of Jira expressions analysis.
     *
     * @param JiraExpressionAnalysis[] $results
     */
    public function setResults(array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;

        return $this;
    }
}
