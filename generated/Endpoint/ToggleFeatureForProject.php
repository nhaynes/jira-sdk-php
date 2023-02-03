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

class ToggleFeatureForProject extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $featureKey;

    /**
     * Sets the state of a project feature.
     *
     * @param string $projectIdOrKey the ID or (case-sensitive) key of the project
     * @param string $featureKey     the key of the feature
     */
    public function __construct(string $projectIdOrKey, string $featureKey, \JiraSdk\Api\Model\ProjectFeatureState $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->featureKey = $featureKey;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{featureKey}'], [$this->projectIdOrKey, $this->featureKey], '/rest/api/3/project/{projectIdOrKey}/features/{featureKey}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ProjectFeatureState) {
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
     * @return \JiraSdk\Api\Model\ContainerForProjectFeatures|null
     *
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ContainerForProjectFeatures', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\ToggleFeatureForProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\ToggleFeatureForProjectUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\ToggleFeatureForProjectForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\ToggleFeatureForProjectNotFoundException($response);
        }
    }
}
