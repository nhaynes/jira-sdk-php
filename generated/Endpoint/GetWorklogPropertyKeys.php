<?php

namespace JiraSdk\Endpoint;

class GetWorklogPropertyKeys extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $worklogId;
    /**
    * Returns the keys of all properties for a worklog.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    */
    public function __construct(string $issueIdOrKey, string $worklogId)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->worklogId = $worklogId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{worklogId}'), array($this->issueIdOrKey, $this->worklogId), '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorklogPropertyKeysBadRequestException
     * @throws \JiraSdk\Exception\GetWorklogPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorklogPropertyKeysNotFoundException
     *
     * @return null|\JiraSdk\Model\PropertyKeys
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PropertyKeys', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetWorklogPropertyKeysBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorklogPropertyKeysUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorklogPropertyKeysNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
