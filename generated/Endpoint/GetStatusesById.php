<?php

namespace JiraSdk\Endpoint;

class GetStatusesById extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of the statuses specified by one or more status IDs.

    **[Permissions](#permissions) required:**

    *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:

    *  `usages` Returns the project and issue types that use the status in their workflow.
    *     @var array $id The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.

    Min items `1`, Max items `50`
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/statuses';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('expand', 'id'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetStatusesByIdBadRequestException
     * @throws \JiraSdk\Exception\GetStatusesByIdUnauthorizedException
     *
     * @return null|\JiraSdk\Model\JiraStatus[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\JiraStatus[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetStatusesByIdBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetStatusesByIdUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
