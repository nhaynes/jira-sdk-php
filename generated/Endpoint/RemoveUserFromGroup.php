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

class RemoveUserFromGroup extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Removes a user from a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return '/rest/api/3/group/user';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['groupname', 'groupId', 'username', 'accountId']);
        $optionsResolver->setRequired(['accountId']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('groupname', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);
        $optionsResolver->addAllowedTypes('username', ['string']);
        $optionsResolver->addAllowedTypes('accountId', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveUserFromGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveUserFromGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveUserFromGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveUserFromGroupNotFoundException($response);
        }
    }
}
