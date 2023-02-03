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

class RemoteIssueLinkRequest extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.
     *
     * Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.
     *
     * The maximum length is 255 characters.
     *
     * @var string
     */
    protected $globalId;
    /**
     * Details of the remote application the linked item is in. For example, trello.
     *
     * @var RemoteIssueLinkRequestApplication
     */
    protected $application;
    /**
     * Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira.
     *
     * @var string
     */
    protected $relationship;
    /**
     * Details of the item linked to.
     *
     * @var RemoteIssueLinkRequestObject
     */
    protected $object;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.
     *
     * Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.
     *
     * The maximum length is 255 characters.
     */
    public function getGlobalId(): string
    {
        return $this->globalId;
    }

    /**
     * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.
     *
     * Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.
     *
     * The maximum length is 255 characters.
     */
    public function setGlobalId(string $globalId): self
    {
        $this->initialized['globalId'] = true;
        $this->globalId = $globalId;

        return $this;
    }

    /**
     * Details of the remote application the linked item is in. For example, trello.
     */
    public function getApplication(): RemoteIssueLinkRequestApplication
    {
        return $this->application;
    }

    /**
     * Details of the remote application the linked item is in. For example, trello.
     */
    public function setApplication(RemoteIssueLinkRequestApplication $application): self
    {
        $this->initialized['application'] = true;
        $this->application = $application;

        return $this;
    }

    /**
     * Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira.
     */
    public function getRelationship(): string
    {
        return $this->relationship;
    }

    /**
     * Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira.
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
    public function getObject(): RemoteIssueLinkRequestObject
    {
        return $this->object;
    }

    /**
     * Details of the item linked to.
     */
    public function setObject(RemoteIssueLinkRequestObject $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;

        return $this;
    }
}
