<?php

namespace JiraSdk\Endpoint;

class UpdateWorkflowTransitionRuleConfigurations extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Updates configuration of workflow transition rules. The following rule types are supported:

    *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
    *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
    *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)

    Only rules created by the calling Connect app can be updated.

    To assist with app migration, this operation can be used to:

    *  Disable a rule.
    *  Add a `tag`. Use this to filter rules in the [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).

    Rules are enabled if the `disabled` parameter is not provided.

    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param \JiraSdk\Model\WorkflowTransitionRulesUpdate $requestBody
    */
    public function __construct(\JiraSdk\Model\WorkflowTransitionRulesUpdate $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/workflow/rule/config';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\WorkflowTransitionRulesUpdate) {
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
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException
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
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
