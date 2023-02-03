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

class DeleteInactiveWorkflow extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $entityId;

    /**
     * Deletes a workflow.
     *
     * The workflow cannot be deleted if it is:
     *
     *  an active workflow.
     *  a system workflow.
     *  associated with any workflow scheme.
     *  associated with any draft workflow scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $entityId the entity ID of the workflow
     */
    public function __construct(string $entityId)
    {
        $this->entityId = $entityId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{entityId}'], [$this->entityId], '/rest/api/3/workflow/{entityId}');
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

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteInactiveWorkflowBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteInactiveWorkflowUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteInactiveWorkflowForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteInactiveWorkflowNotFoundException($response);
        }
    }
}
