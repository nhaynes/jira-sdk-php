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

class GetProjectIssueSecurityScheme extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;

    /**
     * Returns the [issue security scheme](https://confluence.atlassian.com/x/J4lKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or the *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId the project ID or project key (case sensitive)
     */
    public function __construct(string $projectKeyOrId)
    {
        $this->projectKeyOrId = $projectKeyOrId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{projectKeyOrId}'], [$this->projectKeyOrId], '/rest/api/3/project/{projectKeyOrId}/issuesecuritylevelscheme');
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
     * @return \JiraSdk\Api\Model\SecurityScheme|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\SecurityScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeNotFoundException($response);
        }
    }
}
