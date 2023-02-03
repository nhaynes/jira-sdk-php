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

class DeleteRemoteIssueLinkById extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $linkId;

    /**
     * Deletes a remote issue link from an issue.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects*, *Edit issues*, and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $linkId       the ID of a remote issue link
     */
    public function __construct(string $issueIdOrKey, string $linkId)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->linkId = $linkId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}', '{linkId}'], [$this->issueIdOrKey, $this->linkId], '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdNotFoundException($response);
        }
    }
}
