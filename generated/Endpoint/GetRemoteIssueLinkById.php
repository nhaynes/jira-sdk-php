<?php

namespace JiraSdk\Endpoint;

class GetRemoteIssueLinkById extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $linkId;
    /**
    * Returns a remote issue link for an issue.

    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of the remote issue link.
    */
    public function __construct(string $issueIdOrKey, string $linkId)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->linkId = $linkId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{linkId}'), array($this->issueIdOrKey, $this->linkId), '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}');
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
     * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdBadRequestException
     * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdUnauthorizedException
     * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdForbiddenException
     * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdNotFoundException
     *
     * @return null|\JiraSdk\Model\RemoteIssueLink
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\RemoteIssueLink', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetRemoteIssueLinkByIdBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetRemoteIssueLinkByIdUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetRemoteIssueLinkByIdForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetRemoteIssueLinkByIdNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
