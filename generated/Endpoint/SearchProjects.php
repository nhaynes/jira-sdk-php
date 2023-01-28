<?php

namespace JiraSdk\Endpoint;

class SearchProjects extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of projects visible to the user.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** Projects are returned only where the user has one of:

    *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field.

    *  `category` Sorts by project category. A complete list of category IDs is found using [Get all project categories](#api-rest-api-3-projectCategory-get).
    *  `issueCount` Sorts by the total number of issues in each project.
    *  `key` Sorts by project key.
    *  `lastIssueUpdatedTime` Sorts by the last issue update time.
    *  `name` Sorts by project name.
    *  `owner` Sorts by project lead.
    *  `archivedDate` EXPERIMENTAL. Sorts by project archived date.
    *  `deletedDate` EXPERIMENTAL. Sorts by project deleted date.
    *     @var array $id The project IDs to filter the results by. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Up to 50 project IDs can be provided.
    *     @var array $keys The project keys to filter the results by. To include multiple keys, provide an ampersand-separated list. For example, `keys=PA&keys=PB`. Up to 50 project keys can be provided.
    *     @var string $query Filter the results using a literal string. Projects with a matching `key` or `name` are returned (case insensitive).
    *     @var string $typeKey Orders results by the [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes). This parameter accepts a comma-separated list. Valid values are `business`, `service_desk`, and `software`.
    *     @var int $categoryId The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation.
    *     @var string $action Filter results by projects for which the user can:

    *  `view` the project, meaning that they have one of the following permissions:

        *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  `browse` the project, meaning that they have the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  `edit` the project, meaning that they have one of the following permissions:

        *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:

    *  `description` Returns the project description.
    *  `projectKeys` Returns all project keys associated with a project.
    *  `lead` Returns information about the project lead.
    *  `issueTypes` Returns all issue types associated with the project.
    *  `url` Returns the URL associated with the project.
    *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project.
    *     @var array $status EXPERIMENTAL. Filter results by project status:

    *  `live` Search live projects.
    *  `archived` Search archived projects.
    *  `deleted` Search deleted projects, those in the recycle bin.
    *     @var array $properties EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list.
    *     @var string $propertyQuery EXPERIMENTAL. A query string used to search properties. The query string cannot be specified using a JSON object. For example, to search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `[thepropertykey].something.nested=1`. Note that the propertyQuery key is enclosed in square brackets to enable searching where the propertyQuery key includes dot (.) or equals (=) characters. Note that `thepropertykey` is only returned when included in `properties`.
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
        return '/rest/api/3/project/search';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'orderBy', 'id', 'keys', 'query', 'typeKey', 'categoryId', 'action', 'expand', 'status', 'properties', 'propertyQuery'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'orderBy' => 'key', 'action' => 'view'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('keys', array('array'));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('typeKey', array('string'));
        $optionsResolver->addAllowedTypes('categoryId', array('int'));
        $optionsResolver->addAllowedTypes('action', array('string'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('status', array('array'));
        $optionsResolver->addAllowedTypes('properties', array('array'));
        $optionsResolver->addAllowedTypes('propertyQuery', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SearchProjectsBadRequestException
     * @throws \JiraSdk\Exception\SearchProjectsUnauthorizedException
     * @throws \JiraSdk\Exception\SearchProjectsNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanProject
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanProject', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SearchProjectsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SearchProjectsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SearchProjectsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
