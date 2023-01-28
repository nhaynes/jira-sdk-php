<?php

namespace JiraSdk\Endpoint;

class DeleteRemoteIssueLinkById extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $linkId;
    /**
    * Deletes a remote issue link from an issue.

    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects*, *Edit issues*, and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of a remote issue link.
    */
    public function __construct(string $issueIdOrKey, string $linkId)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->linkId = $linkId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{linkId}'), array($this->issueIdOrKey, $this->linkId), '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdBadRequestException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdForbiddenException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdNotFoundException
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
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByIdBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByIdForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByIdNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
