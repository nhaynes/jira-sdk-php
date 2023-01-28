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

class NotificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Notification';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Notification';
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
        $object = new \JiraSdk\Model\Notification();
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
            $object->setTo($this->denormalizer->denormalize($data['to'], 'JiraSdk\\Model\\NotificationTo', 'json', $context));
            unset($data['to']);
        }
        if (\array_key_exists('restrict', $data)) {
            $object->setRestrict($this->denormalizer->denormalize($data['restrict'], 'JiraSdk\\Model\\NotificationRestrict', 'json', $context));
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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
