<?php

namespace JiraSdk\Endpoint;

class MigrateQueries extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Converts one or more JQL queries with user identifiers (username or user key) to equivalent JQL queries with account IDs.

    You may wish to use this operation if your system stores JQL queries and you want to make them GDPR-compliant. For more information about GDPR-related changes, see the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/).

    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param \JiraSdk\Model\JQLPersonalDataMigrationRequest $requestBody
    */
    public function __construct(\JiraSdk\Model\JQLPersonalDataMigrationRequest $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/jql/pdcleaner';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\JQLPersonalDataMigrationRequest) {
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
     * @throws \JiraSdk\Exception\MigrateQueriesBadRequestException
     * @throws \JiraSdk\Exception\MigrateQueriesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ConvertedJQLQueries
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ConvertedJQLQueries', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\MigrateQueriesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\MigrateQueriesUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
