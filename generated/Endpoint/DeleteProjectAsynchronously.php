<?php

namespace JiraSdk\Endpoint;

class DeleteProjectAsynchronously extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Deletes a project asynchronously.

    This operation is:

    *  transactional, that is, if part of the delete fails the project is not deleted.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    */
    public function __construct(string $projectIdOrKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/delete');
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
     * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyBadRequestException
     * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyNotFoundException
     *
     * @return null|\JiraSdk\Model\TaskProgressBeanObject
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (303 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\TaskProgressBeanObject', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectAsynchronouslyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectAsynchronouslyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteProjectAsynchronouslyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
