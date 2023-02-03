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

class UpdateProjectType extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $newProjectTypeKey;

    /**
     * Deprecated, this feature is no longer supported and no alternatives are available, see [Convert project to a different template or type](https://confluence.atlassian.com/x/yEKeOQ). Updates a [project type](https://confluence.atlassian.com/x/GwiiLQ). The project type can be updated for classic projects only, project type cannot be updated for next-gen projects.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey    the project ID or project key (case sensitive)
     * @param string $newProjectTypeKey the key of the new project type
     */
    public function __construct(string $projectIdOrKey, string $newProjectTypeKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->newProjectTypeKey = $newProjectTypeKey;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{newProjectTypeKey}'], [$this->projectIdOrKey, $this->newProjectTypeKey], '/rest/api/3/project/{projectIdOrKey}/type/{newProjectTypeKey}');
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

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Project|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Project', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateProjectTypeNotFoundException($response);
        }
    }
}
