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

class GetIssuePickerResource extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns lists of issues matching a query string. Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string.
     *
     * This operation returns two lists:
     *
     *  `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter.
     *  `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $query a string to match against text fields in the issue such as title, description, or comments
     *     @var string $currentJQL A JQL query defining a list of issues to search for the query term. Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons. Use `accountId` instead.
     *     @var string $currentIssueKey The key of an issue to exclude from search results. For example, the issue the user is viewing when they perform this query.
     *     @var string $currentProjectId the ID of a project that suggested issues must belong to
     *     @var bool $showSubTasks indicate whether to include subtasks in the suggestions list
     *     @var bool $showSubTaskParent When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query.
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
        return '/rest/api/3/issue/picker';
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
        $optionsResolver->setDefined(['query', 'currentJQL', 'currentIssueKey', 'currentProjectId', 'showSubTasks', 'showSubTaskParent']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('currentJQL', ['string']);
        $optionsResolver->addAllowedTypes('currentIssueKey', ['string']);
        $optionsResolver->addAllowedTypes('currentProjectId', ['string']);
        $optionsResolver->addAllowedTypes('showSubTasks', ['bool']);
        $optionsResolver->addAllowedTypes('showSubTaskParent', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\IssuePickerSuggestions|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssuePickerResourceUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssuePickerSuggestions', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssuePickerResourceUnauthorizedException($response);
        }
    }
}
