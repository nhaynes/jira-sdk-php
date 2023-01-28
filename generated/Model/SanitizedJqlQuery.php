<?php

namespace JiraSdk\Model;

class SanitizedJqlQuery
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
    /**
     * The initial query.
     *
     * @return string
     */
    public function getInitialQuery(): string
    {
        return $this->initialQuery;
    }
    /**
     * The initial query.
     *
     * @param string $initialQuery
     *
     * @return self
     */
    public function setInitialQuery(string $initialQuery): self
    {
        $this->initialized['initialQuery'] = true;
        $this->initialQuery = $initialQuery;
        return $this;
    }
    /**
     * The sanitized query, if there were no errors.
     *
     * @return string|null
     */
    public function getSanitizedQuery(): ?string
    {
        return $this->sanitizedQuery;
    }
    /**
     * The sanitized query, if there were no errors.
     *
     * @param string|null $sanitizedQuery
     *
     * @return self
     */
    public function setSanitizedQuery(?string $sanitizedQuery): self
    {
        $this->initialized['sanitizedQuery'] = true;
        $this->sanitizedQuery = $sanitizedQuery;
        return $this;
    }
    /**
     * The list of errors.
     *
     * @return SanitizedJqlQueryErrors
     */
    public function getErrors(): SanitizedJqlQueryErrors
    {
        return $this->errors;
    }
    /**
     * The list of errors.
     *
     * @param SanitizedJqlQueryErrors $errors
     *
     * @return self
     */
    public function setErrors(SanitizedJqlQueryErrors $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
    /**
     * The account ID of the user for whom sanitization was performed.
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }
    /**
     * The account ID of the user for whom sanitization was performed.
     *
     * @param string|null $accountId
     *
     * @return self
     */
    public function setAccountId(?string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
        return $this;
    }
}
