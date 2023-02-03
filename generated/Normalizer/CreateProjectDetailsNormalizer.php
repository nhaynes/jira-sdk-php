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

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateProjectDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\CreateProjectDetails' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\CreateProjectDetails' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\CreateProjectDetails();
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
        if (\array_key_exists('projectTypeKey', $data)) {
            $object->setProjectTypeKey($data['projectTypeKey']);
        }
        if (\array_key_exists('projectTemplateKey', $data)) {
            $object->setProjectTemplateKey($data['projectTemplateKey']);
        }
        if (\array_key_exists('workflowScheme', $data)) {
            $object->setWorkflowScheme($data['workflowScheme']);
        }
        if (\array_key_exists('issueTypeScreenScheme', $data)) {
            $object->setIssueTypeScreenScheme($data['issueTypeScreenScheme']);
        }
        if (\array_key_exists('issueTypeScheme', $data)) {
            $object->setIssueTypeScheme($data['issueTypeScheme']);
        }
        if (\array_key_exists('fieldConfigurationScheme', $data)) {
            $object->setFieldConfigurationScheme($data['fieldConfigurationScheme']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['key'] = $object->getKey();
        $data['name'] = $object->getName();
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
        if ($object->isInitialized('projectTypeKey') && null !== $object->getProjectTypeKey()) {
            $data['projectTypeKey'] = $object->getProjectTypeKey();
        }
        if ($object->isInitialized('projectTemplateKey') && null !== $object->getProjectTemplateKey()) {
            $data['projectTemplateKey'] = $object->getProjectTemplateKey();
        }
        if ($object->isInitialized('workflowScheme') && null !== $object->getWorkflowScheme()) {
            $data['workflowScheme'] = $object->getWorkflowScheme();
        }
        if ($object->isInitialized('issueTypeScreenScheme') && null !== $object->getIssueTypeScreenScheme()) {
            $data['issueTypeScreenScheme'] = $object->getIssueTypeScreenScheme();
        }
        if ($object->isInitialized('issueTypeScheme') && null !== $object->getIssueTypeScheme()) {
            $data['issueTypeScheme'] = $object->getIssueTypeScheme();
        }
        if ($object->isInitialized('fieldConfigurationScheme') && null !== $object->getFieldConfigurationScheme()) {
            $data['fieldConfigurationScheme'] = $object->getFieldConfigurationScheme();
        }

        return $data;
    }
}
