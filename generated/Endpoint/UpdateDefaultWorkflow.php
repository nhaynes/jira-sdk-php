<?php

namespace JiraSdk\Endpoint;

class UpdateDefaultWorkflow extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Sets the default workflow for a workflow scheme.

    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request object and a draft workflow scheme is created or updated with the new default workflow. The draft workflow scheme can be published in Jira.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param \JiraSdk\Model\DefaultWorkflow $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\DefaultWorkflow $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/default');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\DefaultWorkflow) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Exception\UpdateDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Exception\UpdateDefaultWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateDefaultWorkflowBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateDefaultWorkflowUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateDefaultWorkflowForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateDefaultWorkflowNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
