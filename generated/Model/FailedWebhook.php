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

class FailedWebhook
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook.
     *
     * @var string
     */
    protected $id;
    /**
     * The webhook body.
     *
     * @var string
     */
    protected $body;
    /**
     * The original webhook destination.
     *
     * @var string
     */
    protected $url;
    /**
     * The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry).
     *
     * @var int
     */
    protected $failureTime;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The webhook body.
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * The webhook body.
     */
    public function setBody(string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;

        return $this;
    }

    /**
     * The original webhook destination.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * The original webhook destination.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    /**
     * The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry).
     */
    public function getFailureTime(): int
    {
        return $this->failureTime;
    }

    /**
     * The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry).
     */
    public function setFailureTime(int $failureTime): self
    {
        $this->initialized['failureTime'] = true;
        $this->failureTime = $failureTime;

        return $this;
    }
}
