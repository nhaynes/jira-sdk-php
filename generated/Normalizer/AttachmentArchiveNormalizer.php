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

class AttachmentArchiveNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\AttachmentArchive' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\AttachmentArchive' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\AttachmentArchive();
        if (null === $data || false === \is_array($data)) {
            return $object;
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
        if (\array_key_exists('entries', $data)) {
            $values = [];
            foreach ($data['entries'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\AttachmentArchiveEntry', 'json', $context);
            }
            $object->setEntries($values);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('moreAvailable') && null !== $object->getMoreAvailable()) {
            $data['moreAvailable'] = $object->getMoreAvailable();
        }
        if ($object->isInitialized('totalNumberOfEntriesAvailable') && null !== $object->getTotalNumberOfEntriesAvailable()) {
            $data['totalNumberOfEntriesAvailable'] = $object->getTotalNumberOfEntriesAvailable();
        }
        if ($object->isInitialized('totalEntryCount') && null !== $object->getTotalEntryCount()) {
            $data['totalEntryCount'] = $object->getTotalEntryCount();
        }
        if ($object->isInitialized('entries') && null !== $object->getEntries()) {
            $values = [];
            foreach ($object->getEntries() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['entries'] = $values;
        }

        return $data;
    }
}
