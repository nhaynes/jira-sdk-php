<?php

namespace JiraSdk\Endpoint;

class AssignIssue extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Assigns an issue to a user. Use this operation when the calling user does not have the *Edit Issues* permission but has the *Assign issue* permission for the project that the issue is in.

    If `name` or `accountId` is set to:

    *  `"-1"`, the issue is assigned to the default assignee for the project.
    *  `null`, the issue is set to unassigned.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse Projects* and *Assign Issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue to be assigned.
    * @param \JiraSdk\Model\User $requestBody
    */
    public function __construct(string $issueIdOrKey, \JiraSdk\Model\User $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/assignee');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\User) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AssignIssueBadRequestException
     * @throws \JiraSdk\Exception\AssignIssueForbiddenException
     * @throws \JiraSdk\Exception\AssignIssueNotFoundException
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
            throw new \JiraSdk\Exception\AssignIssueBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AssignIssueForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AssignIssueNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
