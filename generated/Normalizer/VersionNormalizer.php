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

class VersionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Version';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Version';
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
        $object = new \JiraSdk\Model\Version();
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
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('archived', $data)) {
            $object->setArchived($data['archived']);
        }
        if (\array_key_exists('released', $data)) {
            $object->setReleased($data['released']);
        }
        if (\array_key_exists('startDate', $data)) {
            $object->setStartDate(\DateTime::createFromFormat('Y-m-d', $data['startDate'])->setTime(0, 0, 0));
        }
        if (\array_key_exists('releaseDate', $data)) {
            $object->setReleaseDate(\DateTime::createFromFormat('Y-m-d', $data['releaseDate'])->setTime(0, 0, 0));
        }
        if (\array_key_exists('overdue', $data)) {
            $object->setOverdue($data['overdue']);
        }
        if (\array_key_exists('userStartDate', $data)) {
            $object->setUserStartDate($data['userStartDate']);
        }
        if (\array_key_exists('userReleaseDate', $data)) {
            $object->setUserReleaseDate($data['userReleaseDate']);
        }
        if (\array_key_exists('project', $data)) {
            $object->setProject($data['project']);
        }
        if (\array_key_exists('projectId', $data)) {
            $object->setProjectId($data['projectId']);
        }
        if (\array_key_exists('moveUnfixedIssuesTo', $data)) {
            $object->setMoveUnfixedIssuesTo($data['moveUnfixedIssuesTo']);
        }
        if (\array_key_exists('operations', $data)) {
            $values = array();
            foreach ($data['operations'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\SimpleLink', 'json', $context);
            }
            $object->setOperations($values);
        }
        if (\array_key_exists('issuesStatusForFixVersion', $data)) {
            $object->setIssuesStatusForFixVersion($this->denormalizer->denormalize($data['issuesStatusForFixVersion'], 'JiraSdk\\Model\\VersionIssuesStatusForFixVersion', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('expand') && null !== $object->getExpand()) {
            $data['expand'] = $object->getExpand();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('archived') && null !== $object->getArchived()) {
            $data['archived'] = $object->getArchived();
        }
        if ($object->isInitialized('released') && null !== $object->getReleased()) {
            $data['released'] = $object->getReleased();
        }
        if ($object->isInitialized('startDate') && null !== $object->getStartDate()) {
            $data['startDate'] = $object->getStartDate()->format('Y-m-d');
        }
        if ($object->isInitialized('releaseDate') && null !== $object->getReleaseDate()) {
            $data['releaseDate'] = $object->getReleaseDate()->format('Y-m-d');
        }
        if ($object->isInitialized('project') && null !== $object->getProject()) {
            $data['project'] = $object->getProject();
        }
        if ($object->isInitialized('projectId') && null !== $object->getProjectId()) {
            $data['projectId'] = $object->getProjectId();
        }
        if ($object->isInitialized('moveUnfixedIssuesTo') && null !== $object->getMoveUnfixedIssuesTo()) {
            $data['moveUnfixedIssuesTo'] = $object->getMoveUnfixedIssuesTo();
        }
        return $data;
    }
}
