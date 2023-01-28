<?php

namespace JiraSdk\Endpoint;

class DeleteWorkflowTransitionRuleConfigurations extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Deletes workflow transition rules from one or more workflows. These rule types are supported:

    *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
    *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
    *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)

    Only rules created by the calling Connect app can be deleted.

    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param \JiraSdk\Model\WorkflowsWithTransitionRulesDetails $requestBody
    */
    public function __construct(\JiraSdk\Model\WorkflowsWithTransitionRulesDetails $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/workflow/rule/config/delete';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\WorkflowsWithTransitionRulesDetails) {
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
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsForbiddenException
     *
     * @return null|\JiraSdk\Model\WorkflowTransitionRulesUpdateErrors
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowTransitionRulesUpdateErrors', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
