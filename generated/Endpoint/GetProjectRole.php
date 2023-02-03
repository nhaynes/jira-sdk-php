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

class GetProjectRole extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;

    /**
     * Returns a project role's details and actors associated with the project. The list of actors is sorted by display name.
     *
     * To check whether a user belongs to a role based on their group memberships, use [Get user](#api-rest-api-3-user-get) with the `groups` expand parameter selected. Then check whether the user keys and groups match with the actors returned for the project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param int    $id              The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array  $queryParameters {
     *
     *     @var bool $excludeInactiveUsers Exclude inactive users.
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
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{id}'], [$this->projectIdOrKey, $this->id], '/rest/api/3/project/{projectIdOrKey}/role/{id}');
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['excludeInactiveUsers']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['excludeInactiveUsers' => false]);
        $optionsResolver->addAllowedTypes('excludeInactiveUsers', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\ProjectRole|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ProjectRole', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectRoleUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectRoleNotFoundException($response);
        }
    }
}
