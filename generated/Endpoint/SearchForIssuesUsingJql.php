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

class SearchForIssuesUsingJql extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
     *
     * If the JQL query expression is too large to be encoded as a query parameter, use the [POST](#api-rest-api-3-search-post) version of this resource.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Issues are included in the response where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param array $queryParameters {
     *
     *     @var string $jql The [JQL](https://confluence.atlassian.com/x/egORLQ) that defines the search. Note:
     *
     *  If no JQL expression is provided, all issues are returned.
     *  `username` and `userkey` cannot be used as search terms due to privacy reasons. Use `accountId` instead.
     *  If a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page. To manage page size, Jira may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only.
     *     @var string $validateQuery Determines how to validate the JQL query and treat the validation results. Supported values are:
     *
     *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
     *  `warn` Returns all errors as warnings.
     *  `none` No validation is performed.
     *  `true` *Deprecated* A legacy synonym for `strict`.
     *  `false` *Deprecated* A legacy synonym for `warn`.
     *
     * Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
     *     @var array $fields A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `*all` Returns all fields.
     *  `*navigable` Returns navigable fields.
     *  Any issue field, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `summary,comment` Returns only the summary and comments fields.
     *  `-description` Returns all navigable (default) fields except description.
     *  `*all,-comment` Returns all fields except comments.
     *
     * This parameter may be specified multiple times. For example, `fields=field1,field2&fields=field3`.
     *
     * Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
     *     @var string $expand Use [expand](#expansion) to include additional information about issues in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `operations` Returns all possible operations for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
     *     @var array $properties A list of issue property keys for issue properties to include in the results. This parameter accepts a comma-separated list. Multiple properties can also be provided using an ampersand separated list. For example, `properties=prop1,prop2&properties=prop3`. A maximum of 5 issue property keys can be specified.
     *     @var bool $fieldsByKeys Reference fields by their key (rather than ID).
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
        return '/rest/api/3/search';
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
        $optionsResolver->setDefined(['jql', 'startAt', 'maxResults', 'validateQuery', 'fields', 'expand', 'properties', 'fieldsByKeys']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50, 'validateQuery' => 'strict', 'fieldsByKeys' => false]);
        $optionsResolver->addAllowedTypes('jql', ['string']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('validateQuery', ['string']);
        $optionsResolver->addAllowedTypes('fields', ['array']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('properties', ['array']);
        $optionsResolver->addAllowedTypes('fieldsByKeys', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\SearchResults|null
     *
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\SearchResults', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\SearchForIssuesUsingJqlBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\SearchForIssuesUsingJqlUnauthorizedException($response);
        }
    }
}
