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

class DeleteWorkflowTransitionProperty extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $transitionId;

    /**
     * Deletes a property from a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param array $queryParameters {
     *
     *     @var string $key the name of the transition property to delete, also known as the name of the property
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     */
    public function __construct(int $transitionId, array $queryParameters = [])
    {
        $this->transitionId = $transitionId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{transitionId}'], [$this->transitionId], '/rest/api/3/workflow/transitions/{transitionId}/properties');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['key', 'workflowName', 'workflowMode']);
        $optionsResolver->setRequired(['key', 'workflowName']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('key', ['string']);
        $optionsResolver->addAllowedTypes('workflowName', ['string']);
        $optionsResolver->addAllowedTypes('workflowMode', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (304 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyNotFoundException($response);
        }
    }
}
