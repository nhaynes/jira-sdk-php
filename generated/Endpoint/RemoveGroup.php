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

class RemoveGroup extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Deletes a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* strategic [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var string $swapGroup As a group's name can change, use of `swapGroupId` is recommended to identify a group.
     * The group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroupId` parameter.
     *     @var string $swapGroupId The ID of the group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroup` parameter.
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
        return '/rest/api/3/group';
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
        $optionsResolver->setDefined(['groupname', 'groupId', 'swapGroup', 'swapGroupId']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('groupname', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);
        $optionsResolver->addAllowedTypes('swapGroup', ['string']);
        $optionsResolver->addAllowedTypes('swapGroupId', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\RemoveGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveGroupNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveGroupNotFoundException($response);
        }
    }
}
