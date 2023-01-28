<?php

namespace JiraSdk\Endpoint;

class AddGadget extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    /**
     * Adds a gadget to a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int $dashboardId The ID of the dashboard.
     * @param \JiraSdk\Model\DashboardGadgetSettings $requestBody
     */
    public function __construct(int $dashboardId, \JiraSdk\Model\DashboardGadgetSettings $requestBody)
    {
        $this->dashboardId = $dashboardId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}'), array($this->dashboardId), '/rest/api/3/dashboard/{dashboardId}/gadget');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\DashboardGadgetSettings) {
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
     * @throws \JiraSdk\Exception\AddGadgetBadRequestException
     * @throws \JiraSdk\Exception\AddGadgetUnauthorizedException
     * @throws \JiraSdk\Exception\AddGadgetNotFoundException
     *
     * @return null|\JiraSdk\Model\DashboardGadget
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\DashboardGadget', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddGadgetBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddGadgetUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddGadgetNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
