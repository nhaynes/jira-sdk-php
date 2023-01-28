<?php

namespace JiraSdk\Endpoint;

class GetCustomFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns a custom field option. For example, an option in a select list.

    Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** The custom field option is returned as follows:

    *  if the user has the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  if the user has the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the custom field is used in, and the field is visible in at least one layout the user has permission to view.
    *
    * @param string $id The ID of the custom field option.
    */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/customFieldOption/{id}');
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
     * @throws \JiraSdk\Exception\GetCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Exception\GetCustomFieldOptionNotFoundException
     *
     * @return null|\JiraSdk\Model\CustomFieldOption
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\CustomFieldOption', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldOptionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetCustomFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
