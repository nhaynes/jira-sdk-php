<?php

namespace JiraSdk\Endpoint;

class FindUserKeysByQuery extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Finds users with a structured query and returns a [paginated](#pagination) list of user keys.

    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the structured query, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.

    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).

    The query statements are:

    *  `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*.
    *  `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*.
    *  `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*.
    *  `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*.
    *  `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*.
    *  `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*.
    *  `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*.
    *  `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.

    The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ... PROJ-n)*. Statements can be combined using the `AND` and `OR` operators to form more complex queries. For example:

    `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
    *
    * @param array $queryParameters {
    *     @var string $query The search query.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
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
        return '/rest/api/3/user/search/query/key';
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
        $optionsResolver->setDefined(array('query', 'startAt', 'maxResults'));
        $optionsResolver->setRequired(array('query'));
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 100));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\FindUserKeysByQueryBadRequestException
     * @throws \JiraSdk\Exception\FindUserKeysByQueryUnauthorizedException
     * @throws \JiraSdk\Exception\FindUserKeysByQueryForbiddenException
     * @throws \JiraSdk\Exception\FindUserKeysByQueryRequestTimeoutException
     *
     * @return null|\JiraSdk\Model\PageBeanUserKey
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanUserKey', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\FindUserKeysByQueryBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\FindUserKeysByQueryUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\FindUserKeysByQueryForbiddenException($response);
        }
        if (408 === $status) {
            throw new \JiraSdk\Exception\FindUserKeysByQueryRequestTimeoutException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
