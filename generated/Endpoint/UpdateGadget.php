<?php

namespace JiraSdk\Endpoint;

class UpdateGadget extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    protected $gadgetId;
    /**
     * Changes the title, position, and color of the gadget on a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int $dashboardId The ID of the dashboard.
     * @param int $gadgetId The ID of the gadget.
     * @param \JiraSdk\Model\DashboardGadgetUpdateRequest $requestBody
     */
    public function __construct(int $dashboardId, int $gadgetId, \JiraSdk\Model\DashboardGadgetUpdateRequest $requestBody)
    {
        $this->dashboardId = $dashboardId;
        $this->gadgetId = $gadgetId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}', '{gadgetId}'), array($this->dashboardId, $this->gadgetId), '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\DashboardGadgetUpdateRequest) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
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
     * @throws \JiraSdk\Exception\UpdateGadgetBadRequestException
     * @throws \JiraSdk\Exception\UpdateGadgetUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateGadgetNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateGadgetBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateGadgetUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateGadgetNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
