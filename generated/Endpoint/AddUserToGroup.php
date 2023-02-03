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

class AddUserToGroup extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Adds a user to a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     * }
     */
    public function __construct(\JiraSdk\Api\Model\UpdateUserToGroupBean $requestBody, array $queryParameters = [])
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/rest/api/3/group/user';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\UpdateUserToGroupBean) {
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['groupname', 'groupId']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('groupname', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Group|null
     *
     * @throws \JiraSdk\Api\Exception\AddUserToGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Group', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\AddUserToGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\AddUserToGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\AddUserToGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\AddUserToGroupNotFoundException($response);
        }
    }
}
