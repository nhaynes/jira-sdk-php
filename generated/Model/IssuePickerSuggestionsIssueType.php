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

class IssuePickerSuggestionsIssueType
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The label of the type of issues suggested for use in auto-completion.
     *
     * @var string
     */
    protected $label;
    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     *
     * @var string
     */
    protected $sub;
    /**
     * The ID of the type of issues suggested for use in auto-completion.
     *
     * @var string
     */
    protected $id;
    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,.
     *
     * @var string
     */
    protected $msg;
    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @var SuggestedIssue[]
     */
    protected $issues;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The label of the type of issues suggested for use in auto-completion.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * The label of the type of issues suggested for use in auto-completion.
     */
    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     */
    public function getSub(): string
    {
        return $this->sub;
    }

    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     */
    public function setSub(string $sub): self
    {
        $this->initialized['sub'] = true;
        $this->sub = $sub;

        return $this;
    }

    /**
     * The ID of the type of issues suggested for use in auto-completion.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the type of issues suggested for use in auto-completion.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,.
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,.
     */
    public function setMsg(string $msg): self
    {
        $this->initialized['msg'] = true;
        $this->msg = $msg;

        return $this;
    }

    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @return SuggestedIssue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @param SuggestedIssue[] $issues
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }
}
