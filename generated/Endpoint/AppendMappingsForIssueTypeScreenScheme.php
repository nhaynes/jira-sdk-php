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

class AppendMappingsForIssueTypeScreenScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueTypeScreenSchemeId;

    /**
     * Appends issue type to screen scheme mappings to an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId the ID of the issue type screen scheme
     */
    public function __construct(string $issueTypeScreenSchemeId, \JiraSdk\Api\Model\IssueTypeScreenSchemeMappingDetails $requestBody)
    {
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{issueTypeScreenSchemeId}'], [$this->issueTypeScreenSchemeId], '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\IssueTypeScreenSchemeMappingDetails) {
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
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeNotFoundException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeConflictException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeNotFoundException($response);
        }
        if ((null === $contentType) === false && (409 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeConflictException($response);
        }
    }
}
