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

class IssueTypeScreenSchemeDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type screen scheme. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The IDs of the screen schemes for the issue type IDs and *default*. A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme.
     *
     * @var IssueTypeScreenSchemeMapping[]
     */
    protected $issueTypeMappings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the issue type screen scheme. The maximum length is 255 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue type screen scheme. The maximum length is 255 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The IDs of the screen schemes for the issue type IDs and *default*. A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme.
     *
     * @return IssueTypeScreenSchemeMapping[]
     */
    public function getIssueTypeMappings(): array
    {
        return $this->issueTypeMappings;
    }

    /**
     * The IDs of the screen schemes for the issue type IDs and *default*. A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme.
     *
     * @param IssueTypeScreenSchemeMapping[] $issueTypeMappings
     */
    public function setIssueTypeMappings(array $issueTypeMappings): self
    {
        $this->initialized['issueTypeMappings'] = true;
        $this->issueTypeMappings = $issueTypeMappings;

        return $this;
    }
}
