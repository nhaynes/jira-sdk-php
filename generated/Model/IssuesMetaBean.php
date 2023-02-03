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

class IssuesMetaBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The description of the page of issues loaded by the provided JQL query.
     *
     * @var IssuesJqlMetaDataBean
     */
    protected $jql;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The description of the page of issues loaded by the provided JQL query.
     */
    public function getJql(): IssuesJqlMetaDataBean
    {
        return $this->jql;
    }

    /**
     * The description of the page of issues loaded by the provided JQL query.
     */
    public function setJql(IssuesJqlMetaDataBean $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;

        return $this;
    }
}
