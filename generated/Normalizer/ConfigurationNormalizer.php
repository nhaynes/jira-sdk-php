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

class ConfigurationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Configuration';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Configuration';
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
        $object = new \JiraSdk\Model\Configuration();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('votingEnabled', $data)) {
            $object->setVotingEnabled($data['votingEnabled']);
        }
        if (\array_key_exists('watchingEnabled', $data)) {
            $object->setWatchingEnabled($data['watchingEnabled']);
        }
        if (\array_key_exists('unassignedIssuesAllowed', $data)) {
            $object->setUnassignedIssuesAllowed($data['unassignedIssuesAllowed']);
        }
        if (\array_key_exists('subTasksEnabled', $data)) {
            $object->setSubTasksEnabled($data['subTasksEnabled']);
        }
        if (\array_key_exists('issueLinkingEnabled', $data)) {
            $object->setIssueLinkingEnabled($data['issueLinkingEnabled']);
        }
        if (\array_key_exists('timeTrackingEnabled', $data)) {
            $object->setTimeTrackingEnabled($data['timeTrackingEnabled']);
        }
        if (\array_key_exists('attachmentsEnabled', $data)) {
            $object->setAttachmentsEnabled($data['attachmentsEnabled']);
        }
        if (\array_key_exists('timeTrackingConfiguration', $data)) {
            $object->setTimeTrackingConfiguration($this->denormalizer->denormalize($data['timeTrackingConfiguration'], 'JiraSdk\\Model\\ConfigurationTimeTrackingConfiguration', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        return $data;
    }
}
