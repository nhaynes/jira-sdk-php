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

class Notification extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary.
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary.
     */
    public function setSubject(string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;

        return $this;
    }

    /**
     * The plain text body of the email notification for the issue.
     */
    public function getTextBody(): string
    {
        return $this->textBody;
    }

    /**
     * The plain text body of the email notification for the issue.
     */
    public function setTextBody(string $textBody): self
    {
        $this->initialized['textBody'] = true;
        $this->textBody = $textBody;

        return $this;
    }

    /**
     * The HTML body of the email notification for the issue.
     */
    public function getHtmlBody(): string
    {
        return $this->htmlBody;
    }

    /**
     * The HTML body of the email notification for the issue.
     */
    public function setHtmlBody(string $htmlBody): self
    {
        $this->initialized['htmlBody'] = true;
        $this->htmlBody = $htmlBody;

        return $this;
    }

    /**
     * The recipients of the email notification for the issue.
     */
    public function getTo(): NotificationTo
    {
        return $this->to;
    }

    /**
     * The recipients of the email notification for the issue.
     */
    public function setTo(NotificationTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * Restricts the notifications to users with the specified permissions.
     */
    public function getRestrict(): NotificationRestrict
    {
        return $this->restrict;
    }

    /**
     * Restricts the notifications to users with the specified permissions.
     */
    public function setRestrict(NotificationRestrict $restrict): self
    {
        $this->initialized['restrict'] = true;
        $this->restrict = $restrict;

        return $this;
    }
}
