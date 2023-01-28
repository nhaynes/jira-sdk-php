<?php

namespace JiraSdk\Endpoint;

class GetAvatarImageByType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    protected $type;
    protected $accept;
    /**
    * Returns the default project or issue type avatar image.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $type The icon type of the avatar.
    * @param array $queryParameters {
    *     @var string $size The size of the avatar image. If not provided the default size is returned.
    *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
    * }
    * @param array $accept Accept content header application/json|image/png|image/svg+xml|*/*
    */
    public function __construct(string $type, array $queryParameters = array(), array $accept = array())
    {
        $this->type = $type;
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
        return str_replace(array('{type}'), array($this->type), '/rest/api/3/universal_avatar/view/type/{type}');
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
     * @throws \JiraSdk\Exception\GetAvatarImageByTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvatarImageByTypeForbiddenException
     * @throws \JiraSdk\Exception\GetAvatarImageByTypeNotFoundException
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
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByTypeUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByTypeForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetAvatarImageByTypeNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('basicAuth', 'OAuth2');
    }
}