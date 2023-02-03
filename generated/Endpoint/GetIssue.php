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

class GetIssue extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;

    /**
     * Returns the details for an issue.
     *
     * The issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed. If a matching issue is found its details are returned, a 302 or other redirect is **not** returned. The issue key returned in the response is the key of the issue found.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var array $fields A list of fields to return for the issue. This parameter accepts a comma-separated list. Use it to retrieve a subset of fields. Allowed values:
     *
     *  `*all` Returns all fields.
     *  `*navigable` Returns navigable fields.
     *  Any issue field, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `summary,comment` Returns only the summary and comments fields.
     *  `-description` Returns all (default) fields except description.
     *  `*navigable,-comment` Returns all navigable fields except comment.
     *
     * This parameter may be specified multiple times. For example, `fields=field1,field2& fields=field3`.
     *
     * Note: All fields are returned by default. This differs from [Search for issues using JQL (GET)](#api-rest-api-3-search-get) and [Search for issues using JQL (POST)](#api-rest-api-3-search-post) where the default is all navigable fields.
     *     @var bool $fieldsByKeys Whether fields in `fields` are referenced by keys rather than IDs. This parameter is useful where fields have been added by a connect app and a field's key may differ from its ID.
     *     @var string $expand Use [expand](#expansion) to include additional information about the issues in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Returns a JSON array for each version of a field's value, with the highest number representing the most recent version. Note: When included in the request, the `fields` parameter is ignored.
     *     @var array $properties A list of issue properties to return for the issue. This parameter accepts a comma-separated list. Allowed values:
     *
     *  `*all` Returns all issue properties.
     *  Any issue property key, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `*all` Returns all properties.
     *  `*all,-prop1` Returns all properties except `prop1`.
     *  `prop1,prop2` Returns `prop1` and `prop2` properties.
     *
     * This parameter may be specified multiple times. For example, `properties=prop1,prop2& properties=prop3`.
     *     @var bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. This also populates the [JQL issues search](#api-rest-api-3-search-get) `lastViewed` field.
     * }
     */
    public function __construct(string $issueIdOrKey, array $queryParameters = [])
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}'], [$this->issueIdOrKey], '/rest/api/3/issue/{issueIdOrKey}');
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
        $optionsResolver->setDefined(['fields', 'fieldsByKeys', 'expand', 'properties', 'updateHistory']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['fieldsByKeys' => false, 'updateHistory' => false]);
        $optionsResolver->addAllowedTypes('fields', ['array']);
        $optionsResolver->addAllowedTypes('fieldsByKeys', ['bool']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('properties', ['array']);
        $optionsResolver->addAllowedTypes('updateHistory', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\IssueBean|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssueBean', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueNotFoundException($response);
        }
    }
}
