<?php

namespace JiraSdk\Endpoint;

class FindUsersAndGroups extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of users and groups matching a string. The string is used:

    *  for users, to find a case-insensitive match with display name and e-mail address. Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
    *  for groups, to find a case-sensitive match with group name.

    For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned.

    Optionally, the search can be refined to:

    *  the projects and issue types associated with a custom field, such as a user picker. The search can then be further refined to return only users and groups that have permission to view specific:

        *  projects.
        *  issue types.

       If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned. For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C. However, if the search is limited to projects B and D, nothing is returned.
    *  not return Connect app users and groups.
    *  return groups that have a case-insensitive match with the query.

    The primary use case for this resource is to populate a picker field suggestion list with users or groups. To this end, the returned object includes an `html` field for each list. This field highlights the matched query term in the item name with the HTML strong tag. Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/yodKLg).
    *
    * @param array $queryParameters {
    *     @var string $query The search string.
    *     @var int $maxResults The maximum number of items to return in each list.
    *     @var bool $showAvatar Whether the user avatar should be returned. If an invalid value is provided, the default value is used.
    *     @var string $fieldId The custom field ID of the field this request is for.
    *     @var array $projectId The ID of a project that returned users and groups must have permission to view. To include multiple projects, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. This parameter is only used when `fieldId` is present.
    *     @var array $issueTypeId The ID of an issue type that returned users and groups must have permission to view. To include multiple issue types, provide an ampersand-separated list. For example, `issueTypeId=10000&issueTypeId=10001`. Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported. This parameter is only used when `fieldId` is present.
    *     @var string $avatarSize The size of the avatar to return. If an invalid value is provided, the default value is used.
    *     @var bool $caseInsensitive Whether the search for groups should be case insensitive.
    *     @var bool $excludeConnectAddons Whether Connect app users and groups should be excluded from the search results. If an invalid value is provided, the default value is used.
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
        return '/rest/api/3/groupuserpicker';
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
        $optionsResolver->setDefined(array('query', 'maxResults', 'showAvatar', 'fieldId', 'projectId', 'issueTypeId', 'avatarSize', 'caseInsensitive', 'excludeConnectAddons'));
        $optionsResolver->setRequired(array('query'));
        $optionsResolver->setDefaults(array('maxResults' => 50, 'showAvatar' => false, 'avatarSize' => 'xsmall', 'caseInsensitive' => false, 'excludeConnectAddons' => false));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('showAvatar', array('bool'));
        $optionsResolver->addAllowedTypes('fieldId', array('string'));
        $optionsResolver->addAllowedTypes('projectId', array('array'));
        $optionsResolver->addAllowedTypes('issueTypeId', array('array'));
        $optionsResolver->addAllowedTypes('avatarSize', array('string'));
        $optionsResolver->addAllowedTypes('caseInsensitive', array('bool'));
        $optionsResolver->addAllowedTypes('excludeConnectAddons', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\FindUsersAndGroupsBadRequestException
     * @throws \JiraSdk\Exception\FindUsersAndGroupsUnauthorizedException
     * @throws \JiraSdk\Exception\FindUsersAndGroupsForbiddenException
     * @throws \JiraSdk\Exception\FindUsersAndGroupsTooManyRequestsException
     *
     * @return null|\JiraSdk\Model\FoundUsersAndGroups
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\FoundUsersAndGroups', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\FindUsersAndGroupsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\FindUsersAndGroupsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\FindUsersAndGroupsForbiddenException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Exception\FindUsersAndGroupsTooManyRequestsException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
