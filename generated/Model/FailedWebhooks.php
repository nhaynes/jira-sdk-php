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

class FailedWebhooks
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of webhooks.
     *
     * @var FailedWebhook[]
     */
    protected $values;
    /**
     * The maximum number of items on the page. If the list of values is shorter than this number, then there are no more pages.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The URL to the next page of results. Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time. You can save the URL to the next page and query for new results periodically (for example, every hour).
     *
     * @var string
     */
    protected $next;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of webhooks.
     *
     * @return FailedWebhook[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * The list of webhooks.
     *
     * @param FailedWebhook[] $values
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }

    /**
     * The maximum number of items on the page. If the list of values is shorter than this number, then there are no more pages.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of items on the page. If the list of values is shorter than this number, then there are no more pages.
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }

    /**
     * The URL to the next page of results. Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time. You can save the URL to the next page and query for new results periodically (for example, every hour).
     */
    public function getNext(): string
    {
        return $this->next;
    }

    /**
     * The URL to the next page of results. Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time. You can save the URL to the next page and query for new results periodically (for example, every hour).
     */
    public function setNext(string $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;

        return $this;
    }
}
