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

class AddActorUsers extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;

    /**
     * Adds actors to a project role for the project.
     *
     * To replace all actors for the project, use [Set actors for project role](#api-rest-api-3-project-projectIdOrKey-role-id-put).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param int    $id             The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     */
    public function __construct(string $projectIdOrKey, int $id, \JiraSdk\Api\Model\ActorsMap $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{id}'], [$this->projectIdOrKey, $this->id], '/rest/api/3/project/{projectIdOrKey}/role/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ActorsMap) {
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
     * @return \JiraSdk\Api\Model\ProjectRole|null
     *
     * @throws \JiraSdk\Api\Exception\AddActorUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\AddActorUsersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddActorUsersNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ProjectRole', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\AddActorUsersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\AddActorUsersUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\AddActorUsersNotFoundException($response);
        }
    }
}
