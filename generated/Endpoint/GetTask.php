<?php

namespace JiraSdk\Endpoint;

class GetTask extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $taskId;
    /**
    * Returns the status of a [long-running asynchronous task](#async).

    When a task has finished, this operation returns the JSON blob applicable to the task. See the documentation of the operation that created the task for details. Task details are not permanently retained. As of September 2019, details are retained for 14 days although this period may change without notice.

    **[Permissions](#permissions) required:** either of:

    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  Creator of the task.
    *
    * @param string $taskId The ID of the task.
    */
    public function __construct(string $taskId)
    {
        $this->taskId = $taskId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{taskId}'), array($this->taskId), '/rest/api/3/task/{taskId}');
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
     * @throws \JiraSdk\Exception\GetTaskUnauthorizedException
     * @throws \JiraSdk\Exception\GetTaskForbiddenException
     * @throws \JiraSdk\Exception\GetTaskNotFoundException
     *
     * @return null|\JiraSdk\Model\TaskProgressBeanObject
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\TaskProgressBeanObject', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetTaskUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetTaskForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetTaskNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
