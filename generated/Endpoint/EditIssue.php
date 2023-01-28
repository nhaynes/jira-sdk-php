<?php

namespace JiraSdk\Endpoint;

class EditIssue extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Edits an issue. A transition may be applied and issue properties updated as part of the edit.

    The edits to the issue's fields are defined using `update` and `fields`. The fields that can be edited are determined using [ Get edit issue metadata](#api-rest-api-3-issue-issueIdOrKey-editmeta-get).

    The parent field may be set by key or ID. For standard issue types, the parent may be removed by setting `update.parent.set.none` to *true*. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.

    Connect apps having an app user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\IssueUpdateDetails $requestBody
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether a notification email about the issue update is sent to all watchers. To disable the notification, administer Jira or administer project permissions are required. If the user doesn't have the necessary permission the request is ignored.
    *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    */
    public function __construct(string $issueIdOrKey, \JiraSdk\Model\IssueUpdateDetails $requestBody, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueUpdateDetails) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('notifyUsers', 'overrideScreenSecurity', 'overrideEditableFlag'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('notifyUsers' => true, 'overrideScreenSecurity' => false, 'overrideEditableFlag' => false));
        $optionsResolver->addAllowedTypes('notifyUsers', array('bool'));
        $optionsResolver->addAllowedTypes('overrideScreenSecurity', array('bool'));
        $optionsResolver->addAllowedTypes('overrideEditableFlag', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\EditIssueBadRequestException
     * @throws \JiraSdk\Exception\EditIssueUnauthorizedException
     * @throws \JiraSdk\Exception\EditIssueForbiddenException
     * @throws \JiraSdk\Exception\EditIssueNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\EditIssueBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\EditIssueUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\EditIssueForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\EditIssueNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
