<?php

namespace JiraSdk\Endpoint;

class GetFieldsPaginated extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of fields for Classic Jira projects. The list can include:

    *  all fields
    *  specific fields, by defining `id`
    *  fields that contain a string in the field name or description, by defining `query`
    *  specific fields that contain a string in the field name or description, by defining `id` and `query`

    Only custom fields can be queried, `type` must be set to `custom`.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $type The type of fields to search.
    *     @var array $id The IDs of the custom fields to return or, where `query` is specified, filter.
    *     @var string $query String used to perform a case-insensitive partial match with field names or descriptions.
    *     @var string $orderBy [Order](#ordering) the results by a field:

    *  `contextsCount` sorts by the number of contexts related to a field
    *  `lastUsed` sorts by the date when the value of the field last changed
    *  `name` sorts by the field name
    *  `screensCount` sorts by the number of screens related to a field
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:

    *  `key` returns the key for each field
    *  `lastUsed` returns the date when the value of the field last changed
    *  `screensCount` returns the number of screens related to a field
    *  `contextsCount` returns the number of contexts related to a field
    *  `isLocked` returns information about whether the field is [locked](https://confluence.atlassian.com/x/ZSN7Og)
    *  `searcherKey` returns the searcher key for each custom field
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
        return '/rest/api/3/field/search';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'type', 'id', 'query', 'orderBy', 'expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('type', array('array'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetFieldsPaginatedBadRequestException
     * @throws \JiraSdk\Exception\GetFieldsPaginatedUnauthorizedException
     * @throws \JiraSdk\Exception\GetFieldsPaginatedForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanField
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanField', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetFieldsPaginatedBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFieldsPaginatedUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetFieldsPaginatedForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
