<?php

namespace JiraSdk\Endpoint;

class UpdateRemoteIssueLink extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $linkId;
    /**
    * Updates a remote issue link for an issue.

    Note: Fields without values in the request are set to null.

    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of the remote issue link.
    * @param \JiraSdk\Model\RemoteIssueLinkRequest $requestBody
    */
    public function __construct(string $issueIdOrKey, string $linkId, \JiraSdk\Model\RemoteIssueLinkRequest $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->linkId = $linkId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{linkId}'), array($this->issueIdOrKey, $this->linkId), '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}');
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
     * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkBadRequestException
     * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkForbiddenException
     * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateRemoteIssueLinkBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateRemoteIssueLinkUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateRemoteIssueLinkForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateRemoteIssueLinkNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
