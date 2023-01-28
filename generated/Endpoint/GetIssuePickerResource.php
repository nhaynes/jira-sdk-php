<?php

namespace JiraSdk\Endpoint;

class GetIssuePickerResource extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns lists of issues matching a query string. Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string.

    This operation returns two lists:

    *  `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter.
    *  `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $query A string to match against text fields in the issue such as title, description, or comments.
    *     @var string $currentJQL A JQL query defining a list of issues to search for the query term. Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons. Use `accountId` instead.
    *     @var string $currentIssueKey The key of an issue to exclude from search results. For example, the issue the user is viewing when they perform this query.
    *     @var string $currentProjectId The ID of a project that suggested issues must belong to.
    *     @var bool $showSubTasks Indicate whether to include subtasks in the suggestions list.
    *     @var bool $showSubTaskParent When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query.
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
        return '/rest/api/3/issue/picker';
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
        $optionsResolver->setDefined(array('query', 'currentJQL', 'currentIssueKey', 'currentProjectId', 'showSubTasks', 'showSubTaskParent'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('currentJQL', array('string'));
        $optionsResolver->addAllowedTypes('currentIssueKey', array('string'));
        $optionsResolver->addAllowedTypes('currentProjectId', array('string'));
        $optionsResolver->addAllowedTypes('showSubTasks', array('bool'));
        $optionsResolver->addAllowedTypes('showSubTaskParent', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIssuePickerResourceUnauthorizedException
     *
     * @return null|\JiraSdk\Model\IssuePickerSuggestions
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssuePickerSuggestions', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssuePickerResourceUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
