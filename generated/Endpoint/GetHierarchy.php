<?php

namespace JiraSdk\Endpoint;

class GetHierarchy extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectId;
    /**
    * Get the issue type hierarchy for a next-gen project.

    The issue type hierarchy for a project consists of:

    *  *Epic* at level 1 (optional).
    *  One or more issue types at level 0 such as *Story*, *Task*, or *Bug*. Where the issue type *Epic* is defined, these issue types are used to break down the content of an epic.
    *  *Subtask* at level -1 (optional). This issue type enables level 0 issue types to be broken down into components. Issues based on a level -1 issue type must have a parent issue.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param int $projectId The ID of the project.
    */
    public function __construct(int $projectId)
    {
        $this->projectId = $projectId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectId}'), array($this->projectId), '/rest/api/3/project/{projectId}/hierarchy');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetHierarchyBadRequestException
     * @throws \JiraSdk\Exception\GetHierarchyUnauthorizedException
     * @throws \JiraSdk\Exception\GetHierarchyNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectIssueTypeHierarchy
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectIssueTypeHierarchy', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetHierarchyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetHierarchyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetHierarchyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
