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

class UpdateDraftDefaultWorkflow extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Sets the default workflow for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id the ID of the workflow scheme that the draft belongs to
     */
    public function __construct(int $id, \JiraSdk\Api\Model\DefaultWorkflow $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/workflowscheme/{id}/draft/default');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\DefaultWorkflow) {
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
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\WorkflowScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowNotFoundException($response);
        }
    }
}
