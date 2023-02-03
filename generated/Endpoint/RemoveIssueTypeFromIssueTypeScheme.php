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

class RemoveIssueTypeFromIssueTypeScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;
    protected $issueTypeId;

    /**
     * Removes an issue type from an issue type scheme.
     *
     * This operation cannot remove:
     *
     *  any issue type used by issues.
     *  any issue types from the default issue type scheme.
     *  the last standard issue type from an issue type scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $issueTypeSchemeId the ID of the issue type scheme
     * @param int $issueTypeId       the ID of the issue type
     */
    public function __construct(int $issueTypeSchemeId, int $issueTypeId)
    {
        $this->issueTypeSchemeId = $issueTypeSchemeId;
        $this->issueTypeId = $issueTypeId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{issueTypeSchemeId}', '{issueTypeId}'], [$this->issueTypeSchemeId, $this->issueTypeId], '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/{issueTypeId}');
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
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException($response);
        }
    }
}
