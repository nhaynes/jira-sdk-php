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

class IssueLinkTypes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The issue link type bean.
     *
     * @var IssueLinkType[]
     */
    protected $issueLinkTypes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The issue link type bean.
     *
     * @return IssueLinkType[]
     */
    public function getIssueLinkTypes(): array
    {
        return $this->issueLinkTypes;
    }

    /**
     * The issue link type bean.
     *
     * @param IssueLinkType[] $issueLinkTypes
     */
    public function setIssueLinkTypes(array $issueLinkTypes): self
    {
        $this->initialized['issueLinkTypes'] = true;
        $this->issueLinkTypes = $issueLinkTypes;

        return $this;
    }
}
