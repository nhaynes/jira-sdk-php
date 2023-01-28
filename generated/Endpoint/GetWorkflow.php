<?php

namespace JiraSdk\Endpoint;

class GetWorkflow extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns the workflow-issue type mappings for a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme.
     * @param array $queryParameters {
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     */
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/workflow');
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
        $optionsResolver->setDefined(array('workflowName', 'returnDraftIfExists'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('returnDraftIfExists' => false));
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        $optionsResolver->addAllowedTypes('returnDraftIfExists', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypesWorkflowMapping
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypesWorkflowMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
