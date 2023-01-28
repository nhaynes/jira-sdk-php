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

class TaskProgressBeanObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\TaskProgressBeanObject';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\TaskProgressBeanObject';
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
        $object = new \JiraSdk\Model\TaskProgressBeanObject();
        if (null === $data || false === \is_array($data)) {
            return $object;
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
        if (\array_key_exists('status', $data)) {
            $object->setStatus($data['status']);
        }
        if (\array_key_exists('message', $data)) {
            $object->setMessage($data['message']);
        }
        if (\array_key_exists('result', $data)) {
            $object->setResult($data['result']);
        }
        if (\array_key_exists('submittedBy', $data)) {
            $object->setSubmittedBy($data['submittedBy']);
        }
        if (\array_key_exists('progress', $data)) {
            $object->setProgress($data['progress']);
        }
        if (\array_key_exists('elapsedRuntime', $data)) {
            $object->setElapsedRuntime($data['elapsedRuntime']);
        }
        if (\array_key_exists('submitted', $data)) {
            $object->setSubmitted($data['submitted']);
        }
        if (\array_key_exists('started', $data)) {
            $object->setStarted($data['started']);
        }
        if (\array_key_exists('finished', $data)) {
            $object->setFinished($data['finished']);
        }
        if (\array_key_exists('lastUpdate', $data)) {
            $object->setLastUpdate($data['lastUpdate']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['self'] = $object->getSelf();
        $data['id'] = $object->getId();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        $data['status'] = $object->getStatus();
        if ($object->isInitialized('message') && null !== $object->getMessage()) {
            $data['message'] = $object->getMessage();
        }
        if ($object->isInitialized('result') && null !== $object->getResult()) {
            $data['result'] = $object->getResult();
        }
        $data['submittedBy'] = $object->getSubmittedBy();
        $data['progress'] = $object->getProgress();
        $data['elapsedRuntime'] = $object->getElapsedRuntime();
        $data['submitted'] = $object->getSubmitted();
        if ($object->isInitialized('started') && null !== $object->getStarted()) {
            $data['started'] = $object->getStarted();
        }
        if ($object->isInitialized('finished') && null !== $object->getFinished()) {
            $data['finished'] = $object->getFinished();
        }
        $data['lastUpdate'] = $object->getLastUpdate();
        return $data;
    }
}
