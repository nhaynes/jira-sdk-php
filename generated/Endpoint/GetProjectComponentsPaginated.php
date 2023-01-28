<?php

namespace JiraSdk\Endpoint;

class GetProjectComponentsPaginated extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns a [paginated](#pagination) list of all components in a project. See the [Get project components](#api-rest-api-3-project-projectIdOrKey-components-get) resource if you want to get a full list of versions without pagination.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field:

    *  `description` Sorts by the component description.
    *  `issueCount` Sorts by the count of issues associated with the component.
    *  `lead` Sorts by the user key of the component's project lead.
    *  `name` Sorts by component name.
    *     @var string $query Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive).
    * }
    */
    public function __construct(string $projectIdOrKey, array $queryParameters = array())
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/component');
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'orderBy', 'query'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('query', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetProjectComponentsPaginatedUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectComponentsPaginatedNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanComponentWithIssueCount
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanComponentWithIssueCount', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectComponentsPaginatedUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectComponentsPaginatedNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
