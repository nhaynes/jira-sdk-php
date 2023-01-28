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

class AttachmentArchiveNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\AttachmentArchive';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\AttachmentArchive';
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
        $object = new \JiraSdk\Model\AttachmentArchive();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('entries', $data)) {
            $values = array();
            foreach ($data['entries'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\AttachmentArchiveEntry', 'json', $context);
            }
            $object->setEntries($values);
        }
        if (\array_key_exists('moreAvailable', $data)) {
            $object->setMoreAvailable($data['moreAvailable']);
        }
        if (\array_key_exists('totalNumberOfEntriesAvailable', $data)) {
            $object->setTotalNumberOfEntriesAvailable($data['totalNumberOfEntriesAvailable']);
        }
        if (\array_key_exists('totalEntryCount', $data)) {
            $object->setTotalEntryCount($data['totalEntryCount']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('entries') && null !== $object->getEntries()) {
            $values = array();
            foreach ($object->getEntries() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['entries'] = $values;
        }
        if ($object->isInitialized('moreAvailable') && null !== $object->getMoreAvailable()) {
            $data['moreAvailable'] = $object->getMoreAvailable();
        }
        if ($object->isInitialized('totalNumberOfEntriesAvailable') && null !== $object->getTotalNumberOfEntriesAvailable()) {
            $data['totalNumberOfEntriesAvailable'] = $object->getTotalNumberOfEntriesAvailable();
        }
        if ($object->isInitialized('totalEntryCount') && null !== $object->getTotalEntryCount()) {
            $data['totalEntryCount'] = $object->getTotalEntryCount();
        }
        return $data;
    }
}
