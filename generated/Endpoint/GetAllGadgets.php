<?php

namespace JiraSdk\Endpoint;

class GetAllGadgets extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $dashboardId;
    /**
    * Returns a list of dashboard gadgets on a dashboard.

    This operation returns:

    *  Gadgets from a list of IDs, when `id` is set.
    *  Gadgets with a module key, when `moduleKey` is set.
    *  Gadgets from a list of URIs, when `uri` is set.
    *  All gadgets, when no other parameters are set.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param int $dashboardId The ID of the dashboard.
    * @param array $queryParameters {
    *     @var array $moduleKey The list of gadgets module keys. To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`.
    *     @var array $uri The list of gadgets URIs. To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`.
    *     @var array $gadgetId The list of gadgets IDs. To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`.
    * }
    */
    public function __construct(int $dashboardId, array $queryParameters = array())
    {
        $this->dashboardId = $dashboardId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{dashboardId}'), array($this->dashboardId), '/rest/api/3/dashboard/{dashboardId}/gadget');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('moduleKey', 'uri', 'gadgetId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('moduleKey', array('array'));
        $optionsResolver->addAllowedTypes('uri', array('array'));
        $optionsResolver->addAllowedTypes('gadgetId', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAllGadgetsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllGadgetsNotFoundException
     *
     * @return null|\JiraSdk\Model\DashboardGadgetResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\DashboardGadgetResponse', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllGadgetsUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAllGadgetsNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
