<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class GetFieldsPaginated extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a [paginated](#pagination) list of fields for Classic Jira projects. The list can include:.
     *
     *  all fields
     *  specific fields, by defining `id`
     *  fields that contain a string in the field name or description, by defining `query`
     *  specific fields that contain a string in the field name or description, by defining `id` and `query`
     *
     * Only custom fields can be queried, `type` must be set to `custom`.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $type the type of fields to search
     *     @var array $id the IDs of the custom fields to return or, where `query` is specified, filter
     *     @var string $query string used to perform a case-insensitive partial match with field names or descriptions
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `contextsCount` sorts by the number of contexts related to a field
     *  `lastUsed` sorts by the date when the value of the field last changed
     *  `name` sorts by the field name
     *  `screensCount` sorts by the number of screens related to a field
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `key` returns the key for each field
     *  `lastUsed` returns the date when the value of the field last changed
     *  `screensCount` returns the number of screens related to a field
     *  `contextsCount` returns the number of contexts related to a field
     *  `isLocked` returns information about whether the field is [locked](https://confluence.atlassian.com/x/ZSN7Og)
     *  `searcherKey` returns the searcher key for each custom field
     * }
     */
    public function __construct(array $queryParameters = [])
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
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['startAt', 'maxResults', 'type', 'id', 'query', 'orderBy', 'expand']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('type', ['array']);
        $optionsResolver->addAllowedTypes('id', ['array']);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('expand', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanField|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanField', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetFieldsPaginatedBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetFieldsPaginatedUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetFieldsPaginatedForbiddenException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
