<?php

namespace JiraSdk\Model;

class LinkIssueRequestJsonBean
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
     * This object is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it defines and reports on the type of link between the issues. Find a list of issue link types with [Get issue link types](#api-rest-api-3-issueLinkType-get).
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it defines and reports on issue link types.
     *
     * @var IssueLinkType
     */
    protected $type;
    /**
     * The ID or key of a linked issue.
     *
     * @var LinkedIssue
     */
    protected $inwardIssue;
    /**
     * The ID or key of a linked issue.
     *
     * @var LinkedIssue
     */
    protected $outwardIssue;
    /**
     * A comment.
     *
     * @var Comment
     */
    protected $comment;
    /**
     * This object is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it defines and reports on the type of link between the issues. Find a list of issue link types with [Get issue link types](#api-rest-api-3-issueLinkType-get).
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it defines and reports on issue link types.
     *
     * @return IssueLinkType
     */
    public function getType(): IssueLinkType
    {
        return $this->type;
    }
    /**
     * This object is used as follows:
     *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it defines and reports on the type of link between the issues. Find a list of issue link types with [Get issue link types](#api-rest-api-3-issueLinkType-get).
     *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it defines and reports on issue link types.
     *
     * @param IssueLinkType $type
     *
     * @return self
     */
    public function setType(IssueLinkType $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The ID or key of a linked issue.
     *
     * @return LinkedIssue
     */
    public function getInwardIssue(): LinkedIssue
    {
        return $this->inwardIssue;
    }
    /**
     * The ID or key of a linked issue.
     *
     * @param LinkedIssue $inwardIssue
     *
     * @return self
     */
    public function setInwardIssue(LinkedIssue $inwardIssue): self
    {
        $this->initialized['inwardIssue'] = true;
        $this->inwardIssue = $inwardIssue;
        return $this;
    }
    /**
     * The ID or key of a linked issue.
     *
     * @return LinkedIssue
     */
    public function getOutwardIssue(): LinkedIssue
    {
        return $this->outwardIssue;
    }
    /**
     * The ID or key of a linked issue.
     *
     * @param LinkedIssue $outwardIssue
     *
     * @return self
     */
    public function setOutwardIssue(LinkedIssue $outwardIssue): self
    {
        $this->initialized['outwardIssue'] = true;
        $this->outwardIssue = $outwardIssue;
        return $this;
    }
    /**
     * A comment.
     *
     * @return Comment
     */
    public function getComment(): Comment
    {
        return $this->comment;
    }
    /**
     * A comment.
     *
     * @param Comment $comment
     *
     * @return self
     */
    public function setComment(Comment $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
}
