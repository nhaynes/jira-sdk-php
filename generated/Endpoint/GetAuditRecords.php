<?php

namespace JiraSdk\Endpoint;

class GetAuditRecords extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of audit records. The list can be filtered to include items:

    *  where each item in `filter` has at least one match in any of these fields:

        *  `summary`
        *  `category`
        *  `eventSource`
        *  `objectItem.name` If the object is a user, account ID is available to filter.
        *  `objectItem.parentName`
        *  `objectItem.typeName`
        *  `changedValues.changedFrom`
        *  `changedValues.changedTo`
        *  `remoteAddress`

       For example, if `filter` contains *man ed*, an audit record containing `summary": "User added to group"` and `"category": "group management"` is returned.
    *  created on or after a date and time.
    *  created or or before a date and time.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $offset The number of records to skip before returning the first result.
    *     @var int $limit The maximum number of results to return.
    *     @var string $filter The strings to match with audit field content, space separated.
    *     @var string $from The date and time on or after which returned audit records must have been created. If `to` is provided `from` must be before `to` or no audit records are returned.
    *     @var string $to The date and time on or before which returned audit results must have been created. If `from` is provided `to` must be after `from` or no audit records are returned.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/auditing/record';
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
        $optionsResolver->setDefined(array('offset', 'limit', 'filter', 'from', 'to'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('offset' => 0, 'limit' => 1000));
        $optionsResolver->addAllowedTypes('offset', array('int'));
        $optionsResolver->addAllowedTypes('limit', array('int'));
        $optionsResolver->addAllowedTypes('filter', array('string'));
        $optionsResolver->addAllowedTypes('from', array('string'));
        $optionsResolver->addAllowedTypes('to', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAuditRecordsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAuditRecordsForbiddenException
     *
     * @return null|\JiraSdk\Model\AuditRecords
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\AuditRecords', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAuditRecordsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAuditRecordsForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
