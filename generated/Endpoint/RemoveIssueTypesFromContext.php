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

class RemoveIssueTypesFromContext extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;

    /**
     * Removes issue types from a custom field context.
     *
     * A custom field context without any issue types applies to all issue types.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId   the ID of the custom field
     * @param int    $contextId the ID of the context
     */
    public function __construct(string $fieldId, int $contextId, \JiraSdk\Api\Model\IssueTypeIds $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldId}', '{contextId}'], [$this->fieldId, $this->contextId], '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype/remove');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\IssueTypeIds) {
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
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypesFromContextBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypesFromContextUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypesFromContextForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypesFromContextNotFoundException($response);
        }
    }
}
