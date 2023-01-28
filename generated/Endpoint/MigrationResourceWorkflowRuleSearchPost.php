<?php

namespace JiraSdk\Endpoint;

class MigrationResourceWorkflowRuleSearchPost extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.
     *
     * @param \JiraSdk\Model\WorkflowRulesSearch $requestBody
     * @param array $headerParameters {
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     */
    public function __construct(\JiraSdk\Model\WorkflowRulesSearch $requestBody, array $headerParameters = array())
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/atlassian-connect/1/migration/workflow/rule/search';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\WorkflowRulesSearch) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('Atlassian-Transfer-Id'));
        $optionsResolver->setRequired(array('Atlassian-Transfer-Id'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('Atlassian-Transfer-Id', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException
     * @throws \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException
     *
     * @return null|\JiraSdk\Model\WorkflowRulesSearchDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowRulesSearchDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
