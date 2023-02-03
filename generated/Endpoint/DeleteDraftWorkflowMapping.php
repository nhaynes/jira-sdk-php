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

class DeleteDraftWorkflowMapping extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme that the draft belongs to
     * @param array $queryParameters {
     *
     *     @var string $workflowName The name of the workflow.
     * }
     */
    public function __construct(int $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/workflowscheme/{id}/draft/workflow');
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
        $optionsResolver->setDefined(['workflowName']);
        $optionsResolver->setRequired(['workflowName']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('workflowName', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingNotFoundException($response);
        }
    }
}
