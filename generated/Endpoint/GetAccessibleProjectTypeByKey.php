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

class GetAccessibleProjectTypeByKey extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectTypeKey;

    /**
     * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw) if it is accessible to the user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $projectTypeKey the key of the project type
     */
    public function __construct(string $projectTypeKey)
    {
        $this->projectTypeKey = $projectTypeKey;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{projectTypeKey}'], [$this->projectTypeKey], '/rest/api/3/project/type/{projectTypeKey}/accessible');
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
     * @return \JiraSdk\Api\Model\ProjectType|null
     *
     * @throws \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ProjectType', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyNotFoundException($response);
        }
    }
}
