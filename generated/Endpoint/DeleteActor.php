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

class DeleteActor extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;

    /**
     * Deletes actors from a project role for the project.
     *
     * To remove default actors from the project role, use [Delete default actors from project role](#api-rest-api-3-role-id-actors-delete).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param int    $id              The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array  $queryParameters {
     *
     *     @var string $user the user account ID of the user to remove from the project role
     *     @var string $group The name of the group to remove from the project role. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     *     @var string $groupId The ID of the group to remove from the project role. This parameter cannot be used with the `group` parameter.
     * }
     */
    public function __construct(string $projectIdOrKey, int $id, array $queryParameters = [])
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{id}'], [$this->projectIdOrKey, $this->id], '/rest/api/3/project/{projectIdOrKey}/role/{id}');
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
        $optionsResolver->setDefined(['user', 'group', 'groupId']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('user', ['string']);
        $optionsResolver->addAllowedTypes('group', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteActorBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteActorNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteActorBadRequestException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteActorNotFoundException($response);
        }
    }
}
