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

class PartialUpdateProjectRole extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Updates either the project role's name or its description.
     *
     * You cannot update both the name and description at the same time using this operation. If you send a request with a name and a description only the name is updated.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     */
    public function __construct(int $id, \JiraSdk\Api\Model\CreateUpdateRoleRequestBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/role/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\CreateUpdateRoleRequestBean) {
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
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ProjectRole', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\PartialUpdateProjectRoleBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\PartialUpdateProjectRoleUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\PartialUpdateProjectRoleForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\PartialUpdateProjectRoleNotFoundException($response);
        }
    }
}
