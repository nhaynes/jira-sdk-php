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

class UpdateComponent extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Updates a component. Any fields included in the request are overwritten. If `leadAccountId` is an empty string ("") the component lead is removed.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id the ID of the component
     */
    public function __construct(string $id, \JiraSdk\Api\Model\ProjectComponent $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/component/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ProjectComponent) {
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
     * @return \JiraSdk\Api\Model\ProjectComponent|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateComponentBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateComponentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateComponentForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateComponentNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ProjectComponent', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateComponentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateComponentUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateComponentForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateComponentNotFoundException($response);
        }
    }
}
