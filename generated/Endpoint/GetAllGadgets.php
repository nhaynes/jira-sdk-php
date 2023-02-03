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

class GetAllGadgets extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $dashboardId;

    /**
     * Returns a list of dashboard gadgets on a dashboard.
     *
     * This operation returns:
     *
     *  Gadgets from a list of IDs, when `id` is set.
     *  Gadgets with a module key, when `moduleKey` is set.
     *  Gadgets from a list of URIs, when `uri` is set.
     *  All gadgets, when no other parameters are set.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param int   $dashboardId     the ID of the dashboard
     * @param array $queryParameters {
     *
     *     @var array $moduleKey The list of gadgets module keys. To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`.
     *     @var array $uri The list of gadgets URIs. To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`.
     *     @var array $gadgetId The list of gadgets IDs. To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`.
     * }
     */
    public function __construct(int $dashboardId, array $queryParameters = [])
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
        return str_replace(['{dashboardId}'], [$this->dashboardId], '/rest/api/3/dashboard/{dashboardId}/gadget');
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['moduleKey', 'uri', 'gadgetId']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('moduleKey', ['array']);
        $optionsResolver->addAllowedTypes('uri', ['array']);
        $optionsResolver->addAllowedTypes('gadgetId', ['array']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\DashboardGadgetResponse|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllGadgetsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllGadgetsNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\DashboardGadgetResponse', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllGadgetsUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetAllGadgetsNotFoundException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
