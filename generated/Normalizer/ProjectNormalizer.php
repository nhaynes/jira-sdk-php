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

class ProjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Project' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Project' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\Project();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('lead', $data)) {
            $object->setLead($this->denormalizer->denormalize($data['lead'], 'JiraSdk\\Api\\Model\\ProjectLead', 'json', $context));
        }
        if (\array_key_exists('components', $data)) {
            $values = [];
            foreach ($data['components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\ProjectComponent', 'json', $context);
            }
            $object->setComponents($values);
        }
        if (\array_key_exists('issueTypes', $data)) {
            $values_1 = [];
            foreach ($data['issueTypes'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\IssueTypeDetails', 'json', $context);
            }
            $object->setIssueTypes($values_1);
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        if (\array_key_exists('email', $data)) {
            $object->setEmail($data['email']);
        }
        if (\array_key_exists('assigneeType', $data)) {
            $object->setAssigneeType($data['assigneeType']);
        }
        if (\array_key_exists('versions', $data)) {
            $values_2 = [];
            foreach ($data['versions'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Api\\Model\\Version', 'json', $context);
            }
            $object->setVersions($values_2);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('roles', $data)) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['roles'] as $key => $value_3) {
                $values_3[$key] = $value_3;
            }
            $object->setRoles($values_3);
        }
        if (\array_key_exists('avatarUrls', $data)) {
            $object->setAvatarUrls($this->denormalizer->denormalize($data['avatarUrls'], 'JiraSdk\\Api\\Model\\ProjectAvatarUrls', 'json', $context));
        }
        if (\array_key_exists('projectCategory', $data)) {
            $object->setProjectCategory($this->denormalizer->denormalize($data['projectCategory'], 'JiraSdk\\Api\\Model\\ProjectProjectCategory', 'json', $context));
        }
        if (\array_key_exists('projectTypeKey', $data)) {
            $object->setProjectTypeKey($data['projectTypeKey']);
        }
        if (\array_key_exists('simplified', $data)) {
            $object->setSimplified($data['simplified']);
        }
        if (\array_key_exists('style', $data)) {
            $object->setStyle($data['style']);
        }
        if (\array_key_exists('favourite', $data)) {
            $object->setFavourite($data['favourite']);
        }
        if (\array_key_exists('isPrivate', $data)) {
            $object->setIsPrivate($data['isPrivate']);
        }
        if (\array_key_exists('issueTypeHierarchy', $data)) {
            $object->setIssueTypeHierarchy($this->denormalizer->denormalize($data['issueTypeHierarchy'], 'JiraSdk\\Api\\Model\\ProjectIssueTypeHierarchy', 'json', $context));
        }
        if (\array_key_exists('permissions', $data)) {
            $object->setPermissions($this->denormalizer->denormalize($data['permissions'], 'JiraSdk\\Api\\Model\\ProjectPermissions', 'json', $context));
        }
        if (\array_key_exists('properties', $data)) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['properties'] as $key_1 => $value_4) {
                $values_4[$key_1] = $value_4;
            }
            $object->setProperties($values_4);
        }
        if (\array_key_exists('uuid', $data)) {
            $object->setUuid($data['uuid']);
        }
        if (\array_key_exists('insight', $data)) {
            $object->setInsight($this->denormalizer->denormalize($data['insight'], 'JiraSdk\\Api\\Model\\ProjectInsight', 'json', $context));
        }
        if (\array_key_exists('deleted', $data)) {
            $object->setDeleted($data['deleted']);
        }
        if (\array_key_exists('retentionTillDate', $data)) {
            $object->setRetentionTillDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['retentionTillDate']));
        }
        if (\array_key_exists('deletedDate', $data)) {
            $object->setDeletedDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['deletedDate']));
        }
        if (\array_key_exists('deletedBy', $data)) {
            $object->setDeletedBy($this->denormalizer->denormalize($data['deletedBy'], 'JiraSdk\\Api\\Model\\ProjectDeletedBy', 'json', $context));
        }
        if (\array_key_exists('archived', $data)) {
            $object->setArchived($data['archived']);
        }
        if (\array_key_exists('archivedDate', $data)) {
            $object->setArchivedDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['archivedDate']));
        }
        if (\array_key_exists('archivedBy', $data)) {
            $object->setArchivedBy($this->denormalizer->denormalize($data['archivedBy'], 'JiraSdk\\Api\\Model\\ProjectArchivedBy', 'json', $context));
        }
        if (\array_key_exists('landingPageInfo', $data)) {
            $object->setLandingPageInfo($this->denormalizer->denormalize($data['landingPageInfo'], 'JiraSdk\\Api\\Model\\ProjectLandingPageInfo', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('email') && null !== $object->getEmail()) {
            $data['email'] = $object->getEmail();
        }
        if ($object->isInitialized('favourite') && null !== $object->getFavourite()) {
            $data['favourite'] = $object->getFavourite();
        }

        return $data;
    }
}
