<?php

namespace JiraSdk\Endpoint;

class DeleteWorklogProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $worklogId;
    protected $propertyKey;
    /**
    * Deletes a worklog property.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $propertyKey The key of the property.
    */
    public function __construct(string $issueIdOrKey, string $worklogId, string $propertyKey)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->worklogId = $worklogId;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{worklogId}', '{propertyKey}'), array($this->issueIdOrKey, $this->worklogId, $this->propertyKey), '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorklogPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorklogPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorklogPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
