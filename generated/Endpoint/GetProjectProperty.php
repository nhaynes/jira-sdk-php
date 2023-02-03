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

class GetProjectProperty extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $propertyKey;

    /**
     * Returns the value of a [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $propertyKey    The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
     */
    public function __construct(string $projectIdOrKey, string $propertyKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->propertyKey = $propertyKey;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{propertyKey}'], [$this->projectIdOrKey, $this->propertyKey], '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}');
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
     * @return \JiraSdk\Api\Model\EntityProperty|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\EntityProperty', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectPropertyNotFoundException($response);
        }
    }
}
