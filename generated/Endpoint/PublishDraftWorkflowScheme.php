<?php

namespace JiraSdk\Endpoint;

class PublishDraftWorkflowScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Publishes a draft workflow scheme.

    Where the draft workflow includes new workflow statuses for an issue type, mappings are provided to update issues with the original workflow status to the new workflow status.

    This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain updates.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme that the draft belongs to.
    * @param \JiraSdk\Model\PublishDraftWorkflowScheme $requestBody
    * @param array $queryParameters {
    *     @var bool $validateOnly Whether the request only performs a validation.
    * }
    */
    public function __construct(int $id, \JiraSdk\Model\PublishDraftWorkflowScheme $requestBody, array $queryParameters = array())
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft/publish');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\PublishDraftWorkflowScheme) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('validateOnly'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('validateOnly' => false));
        $optionsResolver->addAllowedTypes('validateOnly', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\TaskProgressBeanObject
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (303 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\TaskProgressBeanObject', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\PublishDraftWorkflowSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\PublishDraftWorkflowSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\PublishDraftWorkflowSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\PublishDraftWorkflowSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
