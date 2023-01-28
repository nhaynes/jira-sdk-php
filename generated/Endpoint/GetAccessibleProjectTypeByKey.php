<?php

namespace JiraSdk\Endpoint;

class GetAccessibleProjectTypeByKey extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectTypeKey;
    /**
     * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw) if it is accessible to the user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $projectTypeKey The key of the project type.
     */
    public function __construct(string $projectTypeKey)
    {
        $this->projectTypeKey = $projectTypeKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectTypeKey}'), array($this->projectTypeKey), '/rest/api/3/project/type/{projectTypeKey}/accessible');
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
     * @throws \JiraSdk\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException
     * @throws \JiraSdk\Exception\GetAccessibleProjectTypeByKeyNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectType
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectType', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAccessibleProjectTypeByKeyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
