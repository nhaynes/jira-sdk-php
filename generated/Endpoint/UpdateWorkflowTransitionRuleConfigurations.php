<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class UpdateWorkflowTransitionRuleConfigurations extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Updates configuration of workflow transition rules. The following rule types are supported:.
     *
     *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
     *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
     *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)
     *
     * Only rules created by the calling Connect app can be updated.
     *
     * To assist with app migration, this operation can be used to:
     *
     *  Disable a rule.
     *  Add a `tag`. Use this to filter rules in the [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
     *
     * Rules are enabled if the `disabled` parameter is not provided.
     *
     **[Permissions](#permissions) required:** Only Connect apps can use this operation.
     */
    public function __construct(\JiraSdk\Api\Model\WorkflowTransitionRulesUpdate $requestBody)
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
        if ($this->body instanceof \JiraSdk\Api\Model\WorkflowTransitionRulesUpdate) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth'];
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionRulesUpdateErrors|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\WorkflowTransitionRulesUpdateErrors', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
