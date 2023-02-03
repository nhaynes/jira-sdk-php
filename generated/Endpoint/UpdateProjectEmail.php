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

class UpdateProjectEmail extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectId;

    /**
     * Sets the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
     *
     * If `emailAddress` is an empty string, the default email address is restored.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int $projectId the project ID
     */
    public function __construct(int $projectId, \JiraSdk\Api\Model\ProjectEmailAddress $requestBody)
    {
        $this->projectId = $projectId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{projectId}'], [$this->projectId], '/rest/api/3/project/{projectId}/email');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ProjectEmailAddress) {
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
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectEmailBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectEmailUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectEmailForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectEmailNotFoundException($response);
        }
    }
}
