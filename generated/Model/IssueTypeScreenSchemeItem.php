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

class IssueTypeScreenSchemeItem
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $issueTypeScreenSchemeId;
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the screen scheme.
     *
     * @var string
     */
    protected $screenSchemeId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function getIssueTypeScreenSchemeId(): string
    {
        return $this->issueTypeScreenSchemeId;
    }

    /**
     * The ID of the issue type screen scheme.
     */
    public function setIssueTypeScreenSchemeId(string $issueTypeScreenSchemeId): self
    {
        $this->initialized['issueTypeScreenSchemeId'] = true;
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;

        return $this;
    }

    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }

    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;

        return $this;
    }

    /**
     * The ID of the screen scheme.
     */
    public function getScreenSchemeId(): string
    {
        return $this->screenSchemeId;
    }

    /**
     * The ID of the screen scheme.
     */
    public function setScreenSchemeId(string $screenSchemeId): self
    {
        $this->initialized['screenSchemeId'] = true;
        $this->screenSchemeId = $screenSchemeId;

        return $this;
    }
}
