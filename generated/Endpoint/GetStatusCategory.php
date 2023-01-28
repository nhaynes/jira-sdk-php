<?php

namespace JiraSdk\Endpoint;

class GetStatusCategory extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $idOrKey;
    /**
     * Returns a status category. Status categories provided a mechanism for categorizing [statuses](#api-rest-api-3-status-idOrName-get).
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $idOrKey The ID or key of the status category.
     */
    public function __construct(string $idOrKey)
    {
        $this->idOrKey = $idOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{idOrKey}'), array($this->idOrKey), '/rest/api/3/statuscategory/{idOrKey}');
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
     * @throws \JiraSdk\Exception\GetStatusCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\GetStatusCategoryNotFoundException
     *
     * @return null|\JiraSdk\Model\StatusCategory
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\StatusCategory', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetStatusCategoryUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetStatusCategoryNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
