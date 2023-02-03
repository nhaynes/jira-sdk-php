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

class FindUsersAndGroups extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a list of users and groups matching a string. The string is used:.
     *
     *  for users, to find a case-insensitive match with display name and e-mail address. Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
     *  for groups, to find a case-sensitive match with group name.
     *
     * For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned.
     *
     * Optionally, the search can be refined to:
     *
     *  the projects and issue types associated with a custom field, such as a user picker. The search can then be further refined to return only users and groups that have permission to view specific:
     *
     *  projects.
     *  issue types.
     *
     * If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned. For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C. However, if the search is limited to projects B and D, nothing is returned.
     *  not return Connect app users and groups.
     *  return groups that have a case-insensitive match with the query.
     *
     * The primary use case for this resource is to populate a picker field suggestion list with users or groups. To this end, the returned object includes an `html` field for each list. This field highlights the matched query term in the item name with the HTML strong tag. Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $query the search string
     *     @var int $maxResults the maximum number of items to return in each list
     *     @var bool $showAvatar Whether the user avatar should be returned. If an invalid value is provided, the default value is used.
     *     @var string $fieldId the custom field ID of the field this request is for
     *     @var array $projectId The ID of a project that returned users and groups must have permission to view. To include multiple projects, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. This parameter is only used when `fieldId` is present.
     *     @var array $issueTypeId The ID of an issue type that returned users and groups must have permission to view. To include multiple issue types, provide an ampersand-separated list. For example, `issueTypeId=10000&issueTypeId=10001`. Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported. This parameter is only used when `fieldId` is present.
     *     @var string $avatarSize The size of the avatar to return. If an invalid value is provided, the default value is used.
     *     @var bool $caseInsensitive whether the search for groups should be case insensitive
     *     @var bool $excludeConnectAddons Whether Connect app users and groups should be excluded from the search results. If an invalid value is provided, the default value is used.
     * }
     */
    public function __construct(array $queryParameters = [])
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
        $optionsResolver->setDefined(['query', 'maxResults', 'showAvatar', 'fieldId', 'projectId', 'issueTypeId', 'avatarSize', 'caseInsensitive', 'excludeConnectAddons']);
        $optionsResolver->setRequired(['query']);
        $optionsResolver->setDefaults(['maxResults' => 50, 'showAvatar' => false, 'avatarSize' => 'xsmall', 'caseInsensitive' => false, 'excludeConnectAddons' => false]);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('showAvatar', ['bool']);
        $optionsResolver->addAllowedTypes('fieldId', ['string']);
        $optionsResolver->addAllowedTypes('projectId', ['array']);
        $optionsResolver->addAllowedTypes('issueTypeId', ['array']);
        $optionsResolver->addAllowedTypes('avatarSize', ['string']);
        $optionsResolver->addAllowedTypes('caseInsensitive', ['bool']);
        $optionsResolver->addAllowedTypes('excludeConnectAddons', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\FoundUsersAndGroups|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsTooManyRequestsException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\FoundUsersAndGroups', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersAndGroupsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersAndGroupsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersAndGroupsForbiddenException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersAndGroupsTooManyRequestsException($response);
        }
    }
}
