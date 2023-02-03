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

class SetSharedTimeTrackingConfiguration extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Sets the time tracking settings.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     */
    public function __construct(\JiraSdk\Api\Model\TimeTrackingConfiguration $requestBody)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return '/rest/api/3/configuration/timetracking/options';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\TimeTrackingConfiguration) {
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
     * @return \JiraSdk\Api\Model\TimeTrackingConfiguration|null
     *
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\TimeTrackingConfiguration', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationForbiddenException($response);
        }
    }
}
