<?php

namespace JiraSdk\Endpoint;

class GetCustomFieldConfiguration extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldIdOrKey;
    /**
    * Returns a [paginated](#pagination) list of configurations for a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).

    The result can be filtered by one of these criteria:

    *  `id`.
    *  `fieldContextId`.
    *  `issueId`.
    *  `projectKeyOrId` and `issueTypeId`.

    Otherwise, all configurations are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
    *
    * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
    * @param array $queryParameters {
    *     @var array $id The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
    *     @var array $fieldContextId The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
    *     @var int $issueId The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`.
    *     @var string $projectKeyOrId The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`.
    *     @var string $issueTypeId The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    */
    public function __construct(string $fieldIdOrKey, array $queryParameters = array())
    {
        $this->fieldIdOrKey = $fieldIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldIdOrKey}'), array($this->fieldIdOrKey), '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration');
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
        $optionsResolver->setDefined(array('id', 'fieldContextId', 'issueId', 'projectKeyOrId', 'issueTypeId', 'startAt', 'maxResults'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 100));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('fieldContextId', array('array'));
        $optionsResolver->addAllowedTypes('issueId', array('int'));
        $optionsResolver->addAllowedTypes('projectKeyOrId', array('string'));
        $optionsResolver->addAllowedTypes('issueTypeId', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetCustomFieldConfigurationBadRequestException
     * @throws \JiraSdk\Exception\GetCustomFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\GetCustomFieldConfigurationForbiddenException
     * @throws \JiraSdk\Exception\GetCustomFieldConfigurationNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanContextualConfiguration
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanContextualConfiguration', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldConfigurationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldConfigurationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
