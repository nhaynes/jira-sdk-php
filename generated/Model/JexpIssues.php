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

class JexpIssues
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The JQL query that specifies the set of issues available in the Jira expression.
     *
     * @var JexpIssuesJql
     */
    protected $jql;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The JQL query that specifies the set of issues available in the Jira expression.
     */
    public function getJql(): JexpIssuesJql
    {
        return $this->jql;
    }

    /**
     * The JQL query that specifies the set of issues available in the Jira expression.
     */
    public function setJql(JexpIssuesJql $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;

        return $this;
    }
}
