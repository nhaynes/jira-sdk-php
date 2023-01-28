<?php

namespace JiraSdk\Endpoint;

class DeleteRemoteIssueLinkByGlobalId extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Deletes the remote issue link from the issue using the link's global ID. Where the global ID includes reserved URL characters these must be escaped in the request. For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`.

    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is implemented, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $globalId The global ID of a remote issue link.
    * }
    */
    public function __construct(string $issueIdOrKey, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/remotelink');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('globalId'));
        $optionsResolver->setRequired(array('globalId'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('globalId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdBadRequestException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdForbiddenException
     * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdNotFoundException
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
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
