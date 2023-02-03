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

class CreateOrUpdateRemoteIssueLink extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;

    /**
     * Creates or updates a remote issue link for an issue.
     *
     * If a `globalId` is provided and a remote issue link with that global ID is found it is updated. Any fields without values in the request are set to null. Otherwise, the remote issue link is created.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     */
    public function __construct(string $issueIdOrKey, \JiraSdk\Api\Model\RemoteIssueLinkRequest $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}'], [$this->issueIdOrKey], '/rest/api/3/issue/{issueIdOrKey}/remotelink');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\RemoteIssueLinkRequest) {
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
     * @return \JiraSdk\Api\Model\RemoteIssueLinkIdentifies|null
     *
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\RemoteIssueLinkIdentifies', 'json');
        }
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\RemoteIssueLinkIdentifies', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException($response);
        }
    }
}
