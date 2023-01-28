<?php

namespace JiraSdk\Endpoint;

class RemoveGadget extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $gadgetId;
    /**
    * Removes a dashboard gadget from a dashboard.

    When a gadget is removed from a dashboard, other gadgets in the same column are moved up to fill the emptied position.

    **[Permissions](#permissions) required:** None.
    *
    * @param int $dashboardId The ID of the dashboard.
    * @param int $gadgetId The ID of the gadget.
    */
    public function __construct(int $dashboardId, int $gadgetId)
    {
        $this->dashboardId = $dashboardId;
        $this->gadgetId = $gadgetId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}', '{gadgetId}'), array($this->dashboardId, $this->gadgetId), '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}');
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
     * @throws \JiraSdk\Exception\RemoveGadgetUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveGadgetNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveGadgetUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveGadgetNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
