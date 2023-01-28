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

class ConnectCustomFieldValueNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ConnectCustomFieldValue';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ConnectCustomFieldValue';
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
        $object = new \JiraSdk\Model\ConnectCustomFieldValue();
        if (\array_key_exists('number', $data) && \is_int($data['number'])) {
            $data['number'] = (float) $data['number'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('_type', $data)) {
            $object->setType($data['_type']);
            unset($data['_type']);
        }
        if (\array_key_exists('issueID', $data)) {
            $object->setIssueID($data['issueID']);
            unset($data['issueID']);
        }
        if (\array_key_exists('fieldID', $data)) {
            $object->setFieldID($data['fieldID']);
            unset($data['fieldID']);
        }
        if (\array_key_exists('string', $data)) {
            $object->setString($data['string']);
            unset($data['string']);
        }
        if (\array_key_exists('number', $data)) {
            $object->setNumber($data['number']);
            unset($data['number']);
        }
        if (\array_key_exists('richText', $data)) {
            $object->setRichText($data['richText']);
            unset($data['richText']);
        }
        if (\array_key_exists('optionID', $data)) {
            $object->setOptionID($data['optionID']);
            unset($data['optionID']);
        }
        if (\array_key_exists('text', $data)) {
            $object->setText($data['text']);
            unset($data['text']);
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
        $data['_type'] = $object->getType();
        $data['issueID'] = $object->getIssueID();
        $data['fieldID'] = $object->getFieldID();
        if ($object->isInitialized('string') && null !== $object->getString()) {
            $data['string'] = $object->getString();
        }
        if ($object->isInitialized('number') && null !== $object->getNumber()) {
            $data['number'] = $object->getNumber();
        }
        if ($object->isInitialized('richText') && null !== $object->getRichText()) {
            $data['richText'] = $object->getRichText();
        }
        if ($object->isInitialized('optionID') && null !== $object->getOptionID()) {
            $data['optionID'] = $object->getOptionID();
        }
        if ($object->isInitialized('text') && null !== $object->getText()) {
            $data['text'] = $object->getText();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
