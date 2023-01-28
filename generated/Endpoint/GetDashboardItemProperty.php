<?php

namespace JiraSdk\Endpoint;

class GetDashboardItemProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $itemId;
    protected $propertyKey;
    /**
    * Returns the key and value of a dashboard item property.

    A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).

    When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.

    There is no resource to set or get dashboard items.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
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
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}', '{itemId}', '{propertyKey}'), array($this->dashboardId, $this->itemId, $this->propertyKey), '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Exception\GetDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\GetDashboardItemPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\EntityProperty
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\EntityProperty', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetDashboardItemPropertyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetDashboardItemPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
