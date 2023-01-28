<?php

namespace JiraSdk\Endpoint;

class MergeVersions extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $moveIssuesTo;
    /**
    * Merges two project versions. The merge is completed by deleting the version specified in `id` and replacing any occurrences of its ID in `fixVersion` with the version ID specified in `moveIssuesTo`.

    Consider using [ Delete and replace version](#api-rest-api-3-version-id-removeAndSwap-post) instead. This resource supports swapping version values in `fixVersion`, `affectedVersion`, and custom fields.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
    *
    * @param string $id The ID of the version to delete.
    * @param string $moveIssuesTo The ID of the version to merge into.
    */
    public function __construct(string $id, string $moveIssuesTo)
    {
        $this->id = $id;
        $this->moveIssuesTo = $moveIssuesTo;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{moveIssuesTo}'), array($this->id, $this->moveIssuesTo), '/rest/api/3/version/{id}/mergeto/{moveIssuesTo}');
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
     * @throws \JiraSdk\Exception\MergeVersionsBadRequestException
     * @throws \JiraSdk\Exception\MergeVersionsUnauthorizedException
     * @throws \JiraSdk\Exception\MergeVersionsNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\MergeVersionsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\MergeVersionsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\MergeVersionsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
