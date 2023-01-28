<?php

namespace JiraSdk\Endpoint;

class GetAllIssueTypeSchemes extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of issue type schemes.

    Only issue type schemes used in classic projects are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of issue type schemes IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var string $orderBy [Order](#ordering) the results by a field:

    *  `name` Sorts by issue type scheme name.
    *  `id` Sorts by issue type scheme ID.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:

    *  `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to.
    *  `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have.
    *     @var string $queryString String used to perform a case-insensitive partial match with issue type scheme name.
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
        return '/rest/api/3/issuetypescheme';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'id', 'orderBy', 'expand', 'queryString'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'orderBy' => 'id', 'expand' => '', 'queryString' => ''));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('queryString', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesBadRequestException
     * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanIssueTypeScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanIssueTypeScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetAllIssueTypeSchemesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllIssueTypeSchemesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAllIssueTypeSchemesForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
