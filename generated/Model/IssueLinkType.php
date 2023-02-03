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

class IssueLinkType extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue link type inward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     *
     * @var string
     */
    protected $inward;
    /**
     * The description of the issue link type outward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     *
     * @var string
     */
    protected $outward;
    /**
     * The URL of the issue link type. Read only.
     *
     * @var string
     */
    protected $self;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue link type and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the issue link type inward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function getInward(): string
    {
        return $this->inward;
    }

    /**
     * The description of the issue link type inward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function setInward(string $inward): self
    {
        $this->initialized['inward'] = true;
        $this->inward = $inward;

        return $this;
    }

    /**
     * The description of the issue link type outward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function getOutward(): string
    {
        return $this->outward;
    }

    /**
     * The description of the issue link type outward link and is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only.
     */
    public function setOutward(string $outward): self
    {
        $this->initialized['outward'] = true;
        $this->outward = $outward;

        return $this;
    }

    /**
     * The URL of the issue link type. Read only.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue link type. Read only.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }
}
