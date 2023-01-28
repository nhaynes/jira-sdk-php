<?php

namespace JiraSdk\Model;

class RemoteIssueLinkRequest extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
    * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.

    Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.

    The maximum length is 255 characters.
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
    /**
    * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.

    Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.

    The maximum length is 255 characters.
    *
    * @return string
    */
    public function getGlobalId(): string
    {
        return $this->globalId;
    }
    /**
    * An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.

    Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.

    The maximum length is 255 characters.
    *
    * @param string $globalId
    *
    * @return self
    */
    public function setGlobalId(string $globalId): self
    {
        $this->initialized['globalId'] = true;
        $this->globalId = $globalId;
        return $this;
    }
    /**
     * Details of the remote application the linked item is in. For example, trello.
     *
     * @return RemoteIssueLinkRequestApplication
     */
    public function getApplication(): RemoteIssueLinkRequestApplication
    {
        return $this->application;
    }
    /**
     * Details of the remote application the linked item is in. For example, trello.
     *
     * @param RemoteIssueLinkRequestApplication $application
     *
     * @return self
     */
    public function setApplication(RemoteIssueLinkRequestApplication $application): self
    {
        $this->initialized['application'] = true;
        $this->application = $application;
        return $this;
    }
    /**
     * Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira.
     *
     * @return string
     */
    public function getRelationship(): string
    {
        return $this->relationship;
    }
    /**
     * Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira.
     *
     * @param string $relationship
     *
     * @return self
     */
    public function setRelationship(string $relationship): self
    {
        $this->initialized['relationship'] = true;
        $this->relationship = $relationship;
        return $this;
    }
    /**
     * Details of the item linked to.
     *
     * @return RemoteIssueLinkRequestObject
     */
    public function getObject(): RemoteIssueLinkRequestObject
    {
        return $this->object;
    }
    /**
     * Details of the item linked to.
     *
     * @param RemoteIssueLinkRequestObject $object
     *
     * @return self
     */
    public function setObject(RemoteIssueLinkRequestObject $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;
        return $this;
    }
}
