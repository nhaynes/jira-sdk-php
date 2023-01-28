<?php

namespace JiraSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Runtime\Normalizer\CheckArray;
use JiraSdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateProjectDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\UpdateProjectDetails';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\UpdateProjectDetails';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\UpdateProjectDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('lead', $data)) {
            $object->setLead($data['lead']);
        }
        if (\array_key_exists('leadAccountId', $data)) {
            $object->setLeadAccountId($data['leadAccountId']);
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        if (\array_key_exists('assigneeType', $data)) {
            $object->setAssigneeType($data['assigneeType']);
        }
        if (\array_key_exists('avatarId', $data)) {
            $object->setAvatarId($data['avatarId']);
        }
        if (\array_key_exists('issueSecurityScheme', $data)) {
            $object->setIssueSecurityScheme($data['issueSecurityScheme']);
        }
        if (\array_key_exists('permissionScheme', $data)) {
            $object->setPermissionScheme($data['permissionScheme']);
        }
        if (\array_key_exists('notificationScheme', $data)) {
            $object->setNotificationScheme($data['notificationScheme']);
        }
        if (\array_key_exists('categoryId', $data)) {
            $object->setCategoryId($data['categoryId']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('key') && null !== $object->getKey()) {
            $data['key'] = $object->getKey();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('lead') && null !== $object->getLead()) {
            $data['lead'] = $object->getLead();
        }
        if ($object->isInitialized('leadAccountId') && null !== $object->getLeadAccountId()) {
            $data['leadAccountId'] = $object->getLeadAccountId();
        }
        if ($object->isInitialized('url') && null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        if ($object->isInitialized('assigneeType') && null !== $object->getAssigneeType()) {
            $data['assigneeType'] = $object->getAssigneeType();
        }
        if ($object->isInitialized('avatarId') && null !== $object->getAvatarId()) {
            $data['avatarId'] = $object->getAvatarId();
        }
        if ($object->isInitialized('issueSecurityScheme') && null !== $object->getIssueSecurityScheme()) {
            $data['issueSecurityScheme'] = $object->getIssueSecurityScheme();
        }
        if ($object->isInitialized('permissionScheme') && null !== $object->getPermissionScheme()) {
            $data['permissionScheme'] = $object->getPermissionScheme();
        }
        if ($object->isInitialized('notificationScheme') && null !== $object->getNotificationScheme()) {
            $data['notificationScheme'] = $object->getNotificationScheme();
        }
        if ($object->isInitialized('categoryId') && null !== $object->getCategoryId()) {
            $data['categoryId'] = $object->getCategoryId();
        }
        return $data;
    }
}
