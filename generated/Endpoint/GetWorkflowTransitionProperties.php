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

class GetWorkflowTransitionProperties extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $transitionId;

    /**
     * Returns the properties on a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira administration console. The ID is shown next to the transition.
     * @param array $queryParameters {
     *
     *     @var bool $includeReservedKeys Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable. To include these properties in the results, set this parameter to *true*.
     *     @var string $key The key of the property being returned, also known as the name of the property. If this parameter is not specified, all properties on the transition are returned.
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to *live* for active and inactive workflows, or *draft* for draft workflows.
     * }
     */
    public function __construct(int $transitionId, array $queryParameters = [])
    {
        $this->transitionId = $transitionId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{transitionId}'], [$this->transitionId], '/rest/api/3/workflow/transitions/{transitionId}/properties');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['includeReservedKeys', 'key', 'workflowName', 'workflowMode']);
        $optionsResolver->setRequired(['workflowName']);
        $optionsResolver->setDefaults(['includeReservedKeys' => false, 'workflowMode' => 'live']);
        $optionsResolver->addAllowedTypes('includeReservedKeys', ['bool']);
        $optionsResolver->addAllowedTypes('key', ['string']);
        $optionsResolver->addAllowedTypes('workflowName', ['string']);
        $optionsResolver->addAllowedTypes('workflowMode', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionProperty|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\WorkflowTransitionProperty', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesNotFoundException($response);
        }
    }
}
