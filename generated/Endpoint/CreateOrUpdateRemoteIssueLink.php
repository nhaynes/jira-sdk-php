<?php

namespace JiraSdk\Endpoint;

class CreateOrUpdateRemoteIssueLink extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Creates or updates a remote issue link for an issue.

    If a `globalId` is provided and a remote issue link with that global ID is found it is updated. Any fields without values in the request are set to null. Otherwise, the remote issue link is created.

    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\RemoteIssueLinkRequest $requestBody
    */
    public function __construct(string $issueIdOrKey, \JiraSdk\Model\RemoteIssueLinkRequest $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/remotelink');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\RemoteIssueLinkRequest) {
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
     * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException
     * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException
     * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException
     *
     * @return null|\JiraSdk\Model\RemoteIssueLinkIdentifies
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\RemoteIssueLinkIdentifies', 'json');
        }
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\RemoteIssueLinkIdentifies', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
