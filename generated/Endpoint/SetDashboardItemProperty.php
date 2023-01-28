<?php

namespace JiraSdk\Endpoint;

class SetDashboardItemProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $itemId;
    protected $propertyKey;
    /**
    * Sets the value of a dashboard item property. Use this resource in apps to store custom data against a dashboard item.

    A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).

    When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.

    There is no resource to set or get dashboard items.

    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $propertyKey The key of the dashboard item property. The maximum length is 255 characters. For dashboard items with a spec URI and no complete module key, if the provided propertyKey is equal to "config", the request body's JSON must be an object with all keys and values as strings.
    * @param mixed $requestBody
    */
    public function __construct(string $dashboardId, string $itemId, string $propertyKey, $requestBody)
    {
        $this->dashboardId = $dashboardId;
        $this->itemId = $itemId;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}', '{itemId}', '{propertyKey}'), array($this->dashboardId, $this->itemId, $this->propertyKey), '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SetDashboardItemPropertyBadRequestException
     * @throws \JiraSdk\Exception\SetDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\SetDashboardItemPropertyForbiddenException
     * @throws \JiraSdk\Exception\SetDashboardItemPropertyNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\SetDashboardItemPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetDashboardItemPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetDashboardItemPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetDashboardItemPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
