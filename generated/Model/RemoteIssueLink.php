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

class RemoteIssueLink
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the link.
     *
     * @var int
     */
    protected $id;
    /**
     * The URL of the link.
     *
     * @var string
     */
    protected $self;
    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     *
     * @var string
     */
    protected $globalId;
    /**
     * Details of the remote application the linked item is in.
     *
     * @var RemoteIssueLinkApplication
     */
    protected $application;
    /**
     * Description of the relationship between the issue and the linked item.
     *
     * @var string
     */
    protected $relationship;
    /**
     * Details of the item linked to.
     *
     * @var RemoteIssueLinkObject
     */
    protected $object;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the link.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the link.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The URL of the link.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the link.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     */
    public function getGlobalId(): string
    {
        return $this->globalId;
    }

    /**
     * The global ID of the link, such as the ID of the item on the remote system.
     */
    public function setGlobalId(string $globalId): self
    {
        $this->initialized['globalId'] = true;
        $this->globalId = $globalId;

        return $this;
    }

    /**
     * Details of the remote application the linked item is in.
     */
    public function getApplication(): RemoteIssueLinkApplication
    {
        return $this->application;
    }

    /**
     * Details of the remote application the linked item is in.
     */
    public function setApplication(RemoteIssueLinkApplication $application): self
    {
        $this->initialized['application'] = true;
        $this->application = $application;

        return $this;
    }

    /**
     * Description of the relationship between the issue and the linked item.
     */
    public function getRelationship(): string
    {
        return $this->relationship;
    }

    /**
     * Description of the relationship between the issue and the linked item.
     */
    public function setRelationship(string $relationship): self
    {
        $this->initialized['relationship'] = true;
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Details of the item linked to.
     */
    public function getObject(): RemoteIssueLinkObject
    {
        return $this->object;
    }

    /**
     * Details of the item linked to.
     */
    public function setObject(RemoteIssueLinkObject $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;

        return $this;
    }
}
