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

class SanitizedJqlQuery
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The initial query.
     *
     * @var string
     */
    protected $initialQuery;
    /**
     * The sanitized query, if there were no errors.
     *
     * @var string|null
     */
    protected $sanitizedQuery;
    /**
     * The list of errors.
     *
     * @var SanitizedJqlQueryErrors
     */
    protected $errors;
    /**
     * The account ID of the user for whom sanitization was performed.
     *
     * @var string|null
     */
    protected $accountId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The initial query.
     */
    public function getInitialQuery(): string
    {
        return $this->initialQuery;
    }

    /**
     * The initial query.
     */
    public function setInitialQuery(string $initialQuery): self
    {
        $this->initialized['initialQuery'] = true;
        $this->initialQuery = $initialQuery;

        return $this;
    }

    /**
     * The sanitized query, if there were no errors.
     */
    public function getSanitizedQuery(): ?string
    {
        return $this->sanitizedQuery;
    }

    /**
     * The sanitized query, if there were no errors.
     */
    public function setSanitizedQuery(?string $sanitizedQuery): self
    {
        $this->initialized['sanitizedQuery'] = true;
        $this->sanitizedQuery = $sanitizedQuery;

        return $this;
    }

    /**
     * The list of errors.
     */
    public function getErrors(): SanitizedJqlQueryErrors
    {
        return $this->errors;
    }

    /**
     * The list of errors.
     */
    public function setErrors(SanitizedJqlQueryErrors $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }

    /**
     * The account ID of the user for whom sanitization was performed.
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * The account ID of the user for whom sanitization was performed.
     */
    public function setAccountId(?string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }
}
