<?php

namespace JiraSdk\Endpoint;

class GetDashboardItemPropertyKeys extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $itemId;
    /**
    * Returns the keys of all properties for a dashboard item.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
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
        return str_replace(array('{dashboardId}', '{itemId}'), array($this->dashboardId, $this->itemId), '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetDashboardItemPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Exception\GetDashboardItemPropertyKeysNotFoundException
     *
     * @return null|\JiraSdk\Model\PropertyKeys
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PropertyKeys', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetDashboardItemPropertyKeysUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetDashboardItemPropertyKeysNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
