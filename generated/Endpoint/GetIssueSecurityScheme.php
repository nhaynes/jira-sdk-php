<?php

namespace JiraSdk\Endpoint;

class GetIssueSecurityScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns an issue security scheme along with its security levels.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project that uses the requested issue security scheme.
     *
     * @param int $id The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/issuesecurityschemes/{id}');
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
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\SecurityScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SecurityScheme', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecuritySchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecuritySchemeForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
