<?php

namespace JiraSdk\Endpoint;

class Search extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Returns a [paginated](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#pagination) list of statuses that match a search on name or project.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `usages` Returns the project and issue types that use the status in their workflow.
     *     @var string $projectId The project the status is part of or null for global statuses.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var string $searchString Term to match status names against or null to search for all statuses in the search scope.
     *     @var string $statusCategory Category of the status to filter by. The supported values are: `TODO`, `IN_PROGRESS`, and `DONE`.
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
        return '/rest/api/3/statuses/search';
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
        $optionsResolver->setDefined(array('expand', 'projectId', 'startAt', 'maxResults', 'searchString', 'statusCategory'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 200));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('projectId', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('searchString', array('string'));
        $optionsResolver->addAllowedTypes('statusCategory', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SearchBadRequestException
     * @throws \JiraSdk\Exception\SearchUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageOfStatuses
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageOfStatuses', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SearchBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SearchUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
