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

class IssueTransition extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue transition. Required when specifying a transition to undertake.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the issue transition.
     *
     * @var string
     */
    protected $name;
    /**
     * Details of the issue status after the transition.
     *
     * @var IssueTransitionTo
     */
    protected $to;
    /**
     * Whether there is a screen associated with the issue transition.
     *
     * @var bool
     */
    protected $hasScreen;
    /**
     * Whether the issue transition is global, that is, the transition is applied to issues regardless of their status.
     *
     * @var bool
     */
    protected $isGlobal;
    /**
     * Whether this is the initial issue transition for the workflow.
     *
     * @var bool
     */
    protected $isInitial;
    /**
     * Whether the transition is available to be performed.
     *
     * @var bool
     */
    protected $isAvailable;
    /**
     * Whether the issue has to meet criteria before the issue transition is applied.
     *
     * @var bool
     */
    protected $isConditional;
    /**
     * Details of the fields associated with the issue transition screen. Use this information to populate `fields` and `update` in a transition request.
     *
     * @var FieldMetadata[]
     */
    protected $fields;
    /**
     * Expand options that include additional transition details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * @var bool
     */
    protected $looped;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue transition. Required when specifying a transition to undertake.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue transition. Required when specifying a transition to undertake.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the issue transition.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue transition.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Details of the issue status after the transition.
     */
    public function getTo(): IssueTransitionTo
    {
        return $this->to;
    }

    /**
     * Details of the issue status after the transition.
     */
    public function setTo(IssueTransitionTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * Whether there is a screen associated with the issue transition.
     */
    public function getHasScreen(): bool
    {
        return $this->hasScreen;
    }

    /**
     * Whether there is a screen associated with the issue transition.
     */
    public function setHasScreen(bool $hasScreen): self
    {
        $this->initialized['hasScreen'] = true;
        $this->hasScreen = $hasScreen;

        return $this;
    }

    /**
     * Whether the issue transition is global, that is, the transition is applied to issues regardless of their status.
     */
    public function getIsGlobal(): bool
    {
        return $this->isGlobal;
    }

    /**
     * Whether the issue transition is global, that is, the transition is applied to issues regardless of their status.
     */
    public function setIsGlobal(bool $isGlobal): self
    {
        $this->initialized['isGlobal'] = true;
        $this->isGlobal = $isGlobal;

        return $this;
    }

    /**
     * Whether this is the initial issue transition for the workflow.
     */
    public function getIsInitial(): bool
    {
        return $this->isInitial;
    }

    /**
     * Whether this is the initial issue transition for the workflow.
     */
    public function setIsInitial(bool $isInitial): self
    {
        $this->initialized['isInitial'] = true;
        $this->isInitial = $isInitial;

        return $this;
    }

    /**
     * Whether the transition is available to be performed.
     */
    public function getIsAvailable(): bool
    {
        return $this->isAvailable;
    }

    /**
     * Whether the transition is available to be performed.
     */
    public function setIsAvailable(bool $isAvailable): self
    {
        $this->initialized['isAvailable'] = true;
        $this->isAvailable = $isAvailable;

        return $this;
    }

    /**
     * Whether the issue has to meet criteria before the issue transition is applied.
     */
    public function getIsConditional(): bool
    {
        return $this->isConditional;
    }

    /**
     * Whether the issue has to meet criteria before the issue transition is applied.
     */
    public function setIsConditional(bool $isConditional): self
    {
        $this->initialized['isConditional'] = true;
        $this->isConditional = $isConditional;

        return $this;
    }

    /**
     * Details of the fields associated with the issue transition screen. Use this information to populate `fields` and `update` in a transition request.
     *
     * @return FieldMetadata[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }

    /**
     * Details of the fields associated with the issue transition screen. Use this information to populate `fields` and `update` in a transition request.
     *
     * @param FieldMetadata[] $fields
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    /**
     * Expand options that include additional transition details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional transition details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    public function getLooped(): bool
    {
        return $this->looped;
    }

    public function setLooped(bool $looped): self
    {
        $this->initialized['looped'] = true;
        $this->looped = $looped;

        return $this;
    }
}
