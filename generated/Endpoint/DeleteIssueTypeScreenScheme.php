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

class DeleteIssueTypeScreenScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueTypeScreenSchemeId;

    /**
     * Deletes an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId the ID of the issue type screen scheme
     */
    public function __construct(string $issueTypeScreenSchemeId)
    {
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{issueTypeScreenSchemeId}'], [$this->issueTypeScreenSchemeId], '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}');
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
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeNotFoundException($response);
        }
    }
}
