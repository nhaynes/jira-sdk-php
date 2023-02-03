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

class IssueBeanOperations extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Details of the link groups defining issue operations.
     *
     * @var LinkGroup[]
     */
    protected $linkGroups;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of the link groups defining issue operations.
     *
     * @return LinkGroup[]
     */
    public function getLinkGroups(): array
    {
        return $this->linkGroups;
    }

    /**
     * Details of the link groups defining issue operations.
     *
     * @param LinkGroup[] $linkGroups
     */
    public function setLinkGroups(array $linkGroups): self
    {
        $this->initialized['linkGroups'] = true;
        $this->linkGroups = $linkGroups;

        return $this;
    }
}
