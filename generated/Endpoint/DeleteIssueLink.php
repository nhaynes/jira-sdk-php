<?php

namespace JiraSdk\Endpoint;

class DeleteIssueLink extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $linkId;
    /**
    * Deletes an issue link.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  Browse project [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the issues in the link.
    *  *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one of the projects containing issues in the link.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, permission to view both of the issues.
    *
    * @param string $linkId The ID of the issue link.
    */
    public function __construct(string $linkId)
    {
        $this->linkId = $linkId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{linkId}'), array($this->linkId), '/rest/api/3/issueLink/{linkId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteIssueLinkBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueLinkNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueLinkNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
