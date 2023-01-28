<?php

namespace JiraSdk\Endpoint;

class GetIssueLink extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $linkId;
    /**
    * Returns an issue link.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse project* [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the linked issues.
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
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{linkId}'), array($this->linkId), '/rest/api/3/issueLink/{linkId}');
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
     * @throws \JiraSdk\Exception\GetIssueLinkBadRequestException
     * @throws \JiraSdk\Exception\GetIssueLinkUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueLinkNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueLink
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueLink', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetIssueLinkBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueLinkUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueLinkNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
