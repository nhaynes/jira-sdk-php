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

class AddIssueTypesToIssueTypeScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;

    /**
     * Adds issue types to an issue type scheme.
     *
     * The added issue types are appended to the issue types list.
     *
     * If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $issueTypeSchemeId the ID of the issue type scheme
     */
    public function __construct(int $issueTypeSchemeId, \JiraSdk\Api\Model\IssueTypeIds $requestBody)
    {
        $this->issueTypeSchemeId = $issueTypeSchemeId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{issueTypeSchemeId}'], [$this->issueTypeSchemeId], '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype');
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
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException($response);
        }
    }
}
