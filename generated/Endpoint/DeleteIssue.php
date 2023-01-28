<?php

namespace JiraSdk\Endpoint;

class DeleteIssue extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Deletes an issue.

    An issue cannot be deleted if it has one or more subtasks. To delete an issue with subtasks, set `deleteSubtasks`. This causes the issue's subtasks to be deleted with the issue.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Delete issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $deleteSubtasks Whether the issue's subtasks are deleted when the issue is deleted.
    * }
    */
    public function __construct(string $issueIdOrKey, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('deleteSubtasks'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('deleteSubtasks' => 'false'));
        $optionsResolver->addAllowedTypes('deleteSubtasks', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteIssueBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
