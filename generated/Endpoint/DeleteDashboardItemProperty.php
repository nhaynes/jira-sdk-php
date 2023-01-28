<?php

namespace JiraSdk\Endpoint;

class DeleteDashboardItemProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $itemId;
    protected $propertyKey;
    /**
    * Deletes a dashboard item property.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $propertyKey The key of the dashboard item property.
    */
    public function __construct(string $dashboardId, string $itemId, string $propertyKey)
    {
        $this->dashboardId = $dashboardId;
        $this->itemId = $itemId;
        $this->propertyKey = $propertyKey;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}', '{itemId}', '{propertyKey}'), array($this->dashboardId, $this->itemId, $this->propertyKey), '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteDashboardItemPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteDashboardItemPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteDashboardItemPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteDashboardItemPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
