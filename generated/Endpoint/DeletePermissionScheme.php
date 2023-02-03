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

class DeletePermissionScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $schemeId;

    /**
     * Deletes a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId the ID of the permission scheme being deleted
     */
    public function __construct(int $schemeId)
    {
        $this->schemeId = $schemeId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{schemeId}'], [$this->schemeId], '/rest/api/3/permissionscheme/{schemeId}');
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
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeletePermissionSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeletePermissionSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeletePermissionSchemeNotFoundException($response);
        }
    }
}
