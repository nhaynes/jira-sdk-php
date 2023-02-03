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

class Comment extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the comment.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the comment.
     *
     * @var string
     */
    protected $id;
    /**
     * The ID of the user who created the comment.
     *
     * @var CommentAuthor
     */
    protected $author;
    /**
     * The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/).
     *
     * @var mixed
     */
    protected $body;
    /**
     * The rendered version of the comment.
     *
     * @var string
     */
    protected $renderedBody;
    /**
     * The ID of the user who updated the comment last.
     *
     * @var CommentUpdateAuthor
     */
    protected $updateAuthor;
    /**
     * The date and time at which the comment was created.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The date and time at which the comment was updated last.
     *
     * @var \DateTime
     */
    protected $updated;
    /**
     * The group or role to which this comment is visible. Optional on create and update.
     *
     * @var CommentVisibility
     */
    protected $visibility;
    /**
     * Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation.
     *
     * @var bool
     */
    protected $jsdPublic;
    /**
     * Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature.
     *
     * @var bool
     */
    protected $jsdAuthorCanSeeRequest;
    /**
     * A list of comment properties. Optional on create and update.
     *
     * @var EntityProperty[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the comment.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the comment.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the comment.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the comment.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The ID of the user who created the comment.
     */
    public function getAuthor(): CommentAuthor
    {
        return $this->author;
    }

    /**
     * The ID of the user who created the comment.
     */
    public function setAuthor(CommentAuthor $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/).
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/).
     *
     * @param mixed $body
     */
    public function setBody($body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;

        return $this;
    }

    /**
     * The rendered version of the comment.
     */
    public function getRenderedBody(): string
    {
        return $this->renderedBody;
    }

    /**
     * The rendered version of the comment.
     */
    public function setRenderedBody(string $renderedBody): self
    {
        $this->initialized['renderedBody'] = true;
        $this->renderedBody = $renderedBody;

        return $this;
    }

    /**
     * The ID of the user who updated the comment last.
     */
    public function getUpdateAuthor(): CommentUpdateAuthor
    {
        return $this->updateAuthor;
    }

    /**
     * The ID of the user who updated the comment last.
     */
    public function setUpdateAuthor(CommentUpdateAuthor $updateAuthor): self
    {
        $this->initialized['updateAuthor'] = true;
        $this->updateAuthor = $updateAuthor;

        return $this;
    }

    /**
     * The date and time at which the comment was created.
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * The date and time at which the comment was created.
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The date and time at which the comment was updated last.
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * The date and time at which the comment was updated last.
     */
    public function setUpdated(\DateTime $updated): self
    {
        $this->initialized['updated'] = true;
        $this->updated = $updated;

        return $this;
    }

    /**
     * The group or role to which this comment is visible. Optional on create and update.
     */
    public function getVisibility(): CommentVisibility
    {
        return $this->visibility;
    }

    /**
     * The group or role to which this comment is visible. Optional on create and update.
     */
    public function setVisibility(CommentVisibility $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation.
     */
    public function getJsdPublic(): bool
    {
        return $this->jsdPublic;
    }

    /**
     * Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation.
     */
    public function setJsdPublic(bool $jsdPublic): self
    {
        $this->initialized['jsdPublic'] = true;
        $this->jsdPublic = $jsdPublic;

        return $this;
    }

    /**
     * Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature.
     */
    public function getJsdAuthorCanSeeRequest(): bool
    {
        return $this->jsdAuthorCanSeeRequest;
    }

    /**
     * Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature.
     */
    public function setJsdAuthorCanSeeRequest(bool $jsdAuthorCanSeeRequest): self
    {
        $this->initialized['jsdAuthorCanSeeRequest'] = true;
        $this->jsdAuthorCanSeeRequest = $jsdAuthorCanSeeRequest;

        return $this;
    }

    /**
     * A list of comment properties. Optional on create and update.
     *
     * @return EntityProperty[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * A list of comment properties. Optional on create and update.
     *
     * @param EntityProperty[] $properties
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
