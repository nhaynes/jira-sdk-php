<?php

namespace JiraSdk\Endpoint;

class DeleteInactiveWorkflow extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $entityId;
    /**
    * Deletes a workflow.

    The workflow cannot be deleted if it is:

    *  an active workflow.
    *  a system workflow.
    *  associated with any workflow scheme.
    *  associated with any draft workflow scheme.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $entityId The entity ID of the workflow.
    */
    public function __construct(string $entityId)
    {
        $this->entityId = $entityId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{entityId}'), array($this->entityId), '/rest/api/3/workflow/{entityId}');
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
     * @throws \JiraSdk\Exception\DeleteInactiveWorkflowBadRequestException
     * @throws \JiraSdk\Exception\DeleteInactiveWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteInactiveWorkflowForbiddenException
     * @throws \JiraSdk\Exception\DeleteInactiveWorkflowNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteInactiveWorkflowBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteInactiveWorkflowUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteInactiveWorkflowForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteInactiveWorkflowNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
