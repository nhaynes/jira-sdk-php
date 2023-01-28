<?php

namespace JiraSdk\Endpoint;

class GetIssueSecurityLevelMembers extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueSecuritySchemeId;
    /**
    * Returns issue security level members.

    Only issue security level members in context of classic projects are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueSecuritySchemeId The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $issueSecurityLevelId The list of issue security level IDs. To include multiple issue security levels separate IDs with ampersand: `issueSecurityLevelId=10000&issueSecurityLevelId=10001`.
    *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:

    *  `all` Returns all expandable information.
    *  `field` Returns information about the custom field granted the permission.
    *  `group` Returns information about the group that is granted the permission.
    *  `projectRole` Returns information about the project role granted the permission.
    *  `user` Returns information about the user who is granted the permission.
    * }
    */
    public function __construct(int $issueSecuritySchemeId, array $queryParameters = array())
    {
        $this->issueSecuritySchemeId = $issueSecuritySchemeId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueSecuritySchemeId}'), array($this->issueSecuritySchemeId), '/rest/api/3/issuesecurityschemes/{issueSecuritySchemeId}/members');
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'issueSecurityLevelId', 'expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('issueSecurityLevelId', array('array'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersBadRequestException
     * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersForbiddenException
     * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanIssueSecurityLevelMember
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanIssueSecurityLevelMember', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecurityLevelMembersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecurityLevelMembersUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecurityLevelMembersForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecurityLevelMembersNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
