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

class IssuesJqlMetaDataBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssuesJqlMetaDataBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssuesJqlMetaDataBean';
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
        $object = new \JiraSdk\Model\IssuesJqlMetaDataBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('startAt', $data)) {
            $object->setStartAt($data['startAt']);
        }
        if (\array_key_exists('maxResults', $data)) {
            $object->setMaxResults($data['maxResults']);
        }
        if (\array_key_exists('count', $data)) {
            $object->setCount($data['count']);
        }
        if (\array_key_exists('totalCount', $data)) {
            $object->setTotalCount($data['totalCount']);
        }
        if (\array_key_exists('validationWarnings', $data)) {
            $values = array();
            foreach ($data['validationWarnings'] as $value) {
                $values[] = $value;
            }
            $object->setValidationWarnings($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['startAt'] = $object->getStartAt();
        $data['maxResults'] = $object->getMaxResults();
        $data['count'] = $object->getCount();
        $data['totalCount'] = $object->getTotalCount();
        if ($object->isInitialized('validationWarnings') && null !== $object->getValidationWarnings()) {
            $values = array();
            foreach ($object->getValidationWarnings() as $value) {
                $values[] = $value;
            }
            $data['validationWarnings'] = $values;
        }
        return $data;
    }
}
