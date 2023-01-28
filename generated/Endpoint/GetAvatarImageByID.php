<?php

namespace JiraSdk\Endpoint;

class GetAvatarImageByID extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    protected $type;
    protected $id;
    protected $accept;
    /**
    * Returns a project or issue type avatar image by ID.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  For system avatars, none.
    *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
    *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
    *
    * @param string $type The icon type of the avatar.
    * @param int $id The ID of the avatar.
    * @param array $queryParameters {
    *     @var string $size The size of the avatar image. If not provided the default size is returned.
    *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
    * }
    * @param array $accept Accept content header application/json|image/png|image/svg+xml|*/*
    */
    public function __construct(string $type, int $id, array $queryParameters = array(), array $accept = array())
    {
        $this->type = $type;
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \JiraSdk\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{type}', '{id}'), array($this->type, $this->id), '/rest/api/3/universal_avatar/view/type/{type}/avatar/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'image/png', 'image/svg+xml', '*/*'));
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('size', 'format'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('size', array('string'));
        $optionsResolver->addAllowedTypes('format', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAvatarImageByIDBadRequestException
     * @throws \JiraSdk\Exception\GetAvatarImageByIDUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvatarImageByIDForbiddenException
     * @throws \JiraSdk\Exception\GetAvatarImageByIDNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByIDBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByIDUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByIDForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByIDNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('basicAuth', 'OAuth2');
    }
}