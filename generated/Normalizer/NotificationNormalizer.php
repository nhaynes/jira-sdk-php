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

class NotificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Notification' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Notification' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\Notification();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('subject', $data)) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        if (\array_key_exists('textBody', $data)) {
            $object->setTextBody($data['textBody']);
            unset($data['textBody']);
        }
        if (\array_key_exists('htmlBody', $data)) {
            $object->setHtmlBody($data['htmlBody']);
            unset($data['htmlBody']);
        }
        if (\array_key_exists('to', $data)) {
            $object->setTo($this->denormalizer->denormalize($data['to'], 'JiraSdk\\Api\\Model\\NotificationTo', 'json', $context));
            unset($data['to']);
        }
        if (\array_key_exists('restrict', $data)) {
            $object->setRestrict($this->denormalizer->denormalize($data['restrict'], 'JiraSdk\\Api\\Model\\NotificationRestrict', 'json', $context));
            unset($data['restrict']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('subject') && null !== $object->getSubject()) {
            $data['subject'] = $object->getSubject();
        }
        if ($object->isInitialized('textBody') && null !== $object->getTextBody()) {
            $data['textBody'] = $object->getTextBody();
        }
        if ($object->isInitialized('htmlBody') && null !== $object->getHtmlBody()) {
            $data['htmlBody'] = $object->getHtmlBody();
        }
        if ($object->isInitialized('to') && null !== $object->getTo()) {
            $data['to'] = $this->normalizer->normalize($object->getTo(), 'json', $context);
        }
        if ($object->isInitialized('restrict') && null !== $object->getRestrict()) {
            $data['restrict'] = $this->normalizer->normalize($object->getRestrict(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
