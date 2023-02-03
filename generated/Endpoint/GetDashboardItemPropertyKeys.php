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

class GetDashboardItemPropertyKeys extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $itemId;

    /**
     * Returns the keys of all properties for a dashboard item.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
     *
     * @param string $dashboardId the ID of the dashboard
     * @param string $itemId      the ID of the dashboard item
     */
    public function __construct(string $dashboardId, string $itemId)
    {
        $this->dashboardId = $dashboardId;
        $this->itemId = $itemId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{dashboardId}', '{itemId}'], [$this->dashboardId, $this->itemId], '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties');
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
     * @return \JiraSdk\Api\Model\PropertyKeys|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PropertyKeys', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysNotFoundException($response);
        }
    }
}
