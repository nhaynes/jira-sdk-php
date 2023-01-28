<?php

namespace JiraSdk\Model;

class Notification extends \ArrayObject
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
     * The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary.
     *
     * @var string
     */
    protected $subject;
    /**
     * The plain text body of the email notification for the issue.
     *
     * @var string
     */
    protected $textBody;
    /**
     * The HTML body of the email notification for the issue.
     *
     * @var string
     */
    protected $htmlBody;
    /**
     * The recipients of the email notification for the issue.
     *
     * @var NotificationTo
     */
    protected $to;
    /**
     * Restricts the notifications to users with the specified permissions.
     *
     * @var NotificationRestrict
     */
    protected $restrict;
    /**
     * The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary.
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }
    /**
     * The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary.
     *
     * @param string $subject
     *
     * @return self
     */
    public function setSubject(string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * The plain text body of the email notification for the issue.
     *
     * @return string
     */
    public function getTextBody(): string
    {
        return $this->textBody;
    }
    /**
     * The plain text body of the email notification for the issue.
     *
     * @param string $textBody
     *
     * @return self
     */
    public function setTextBody(string $textBody): self
    {
        $this->initialized['textBody'] = true;
        $this->textBody = $textBody;
        return $this;
    }
    /**
     * The HTML body of the email notification for the issue.
     *
     * @return string
     */
    public function getHtmlBody(): string
    {
        return $this->htmlBody;
    }
    /**
     * The HTML body of the email notification for the issue.
     *
     * @param string $htmlBody
     *
     * @return self
     */
    public function setHtmlBody(string $htmlBody): self
    {
        $this->initialized['htmlBody'] = true;
        $this->htmlBody = $htmlBody;
        return $this;
    }
    /**
     * The recipients of the email notification for the issue.
     *
     * @return NotificationTo
     */
    public function getTo(): NotificationTo
    {
        return $this->to;
    }
    /**
     * The recipients of the email notification for the issue.
     *
     * @param NotificationTo $to
     *
     * @return self
     */
    public function setTo(NotificationTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Restricts the notifications to users with the specified permissions.
     *
     * @return NotificationRestrict
     */
    public function getRestrict(): NotificationRestrict
    {
        return $this->restrict;
    }
    /**
     * Restricts the notifications to users with the specified permissions.
     *
     * @param NotificationRestrict $restrict
     *
     * @return self
     */
    public function setRestrict(NotificationRestrict $restrict): self
    {
        $this->initialized['restrict'] = true;
        $this->restrict = $restrict;
        return $this;
    }
}
