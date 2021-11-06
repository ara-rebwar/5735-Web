<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/mediatranslation/v1beta1/media_translation.proto

namespace Google\Cloud\MediaTranslation\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Config used for streaming translation.
 *
 * Generated from protobuf message <code>google.cloud.mediatranslation.v1beta1.StreamingTranslateSpeechConfig</code>
 */
class StreamingTranslateSpeechConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The common config for all the following audio contents.
     *
     * Generated from protobuf field <code>.google.cloud.mediatranslation.v1beta1.TranslateSpeechConfig audio_config = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $audio_config = null;
    /**
     * Optional. If `false` or omitted, the system performs
     * continuous translation (continuing to wait for and process audio even if
     * the user pauses speaking) until the client closes the input stream (gRPC
     * API) or until the maximum time limit has been reached. May return multiple
     * `StreamingTranslateSpeechResult`s with the `is_final` flag set to `true`.
     * If `true`, the speech translator will detect a single spoken utterance.
     * When it detects that the user has paused or stopped speaking, it will
     * return an `END_OF_SINGLE_UTTERANCE` event and cease translation.
     * When the client receives 'END_OF_SINGLE_UTTERANCE' event, the client should
     * stop sending the requests. However, clients should keep receiving remaining
     * responses until the stream is terminated. To construct the complete
     * sentence in a streaming way, one should override (if 'is_final' of previous
     * response is false), or append (if 'is_final' of previous response is true).
     *
     * Generated from protobuf field <code>bool single_utterance = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $single_utterance = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\MediaTranslation\V1beta1\TranslateSpeechConfig $audio_config
     *           Required. The common config for all the following audio contents.
     *     @type bool $single_utterance
     *           Optional. If `false` or omitted, the system performs
     *           continuous translation (continuing to wait for and process audio even if
     *           the user pauses speaking) until the client closes the input stream (gRPC
     *           API) or until the maximum time limit has been reached. May return multiple
     *           `StreamingTranslateSpeechResult`s with the `is_final` flag set to `true`.
     *           If `true`, the speech translator will detect a single spoken utterance.
     *           When it detects that the user has paused or stopped speaking, it will
     *           return an `END_OF_SINGLE_UTTERANCE` event and cease translation.
     *           When the client receives 'END_OF_SINGLE_UTTERANCE' event, the client should
     *           stop sending the requests. However, clients should keep receiving remaining
     *           responses until the stream is terminated. To construct the complete
     *           sentence in a streaming way, one should override (if 'is_final' of previous
     *           response is false), or append (if 'is_final' of previous response is true).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Mediatranslation\V1Beta1\MediaTranslation::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The common config for all the following audio contents.
     *
     * Generated from protobuf field <code>.google.cloud.mediatranslation.v1beta1.TranslateSpeechConfig audio_config = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\MediaTranslation\V1beta1\TranslateSpeechConfig|null
     */
    public function getAudioConfig()
    {
        return isset($this->audio_config) ? $this->audio_config : null;
    }

    public function hasAudioConfig()
    {
        return isset($this->audio_config);
    }

    public function clearAudioConfig()
    {
        unset($this->audio_config);
    }

    /**
     * Required. The common config for all the following audio contents.
     *
     * Generated from protobuf field <code>.google.cloud.mediatranslation.v1beta1.TranslateSpeechConfig audio_config = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\MediaTranslation\V1beta1\TranslateSpeechConfig $var
     * @return $this
     */
    public function setAudioConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\MediaTranslation\V1beta1\TranslateSpeechConfig::class);
        $this->audio_config = $var;

        return $this;
    }

    /**
     * Optional. If `false` or omitted, the system performs
     * continuous translation (continuing to wait for and process audio even if
     * the user pauses speaking) until the client closes the input stream (gRPC
     * API) or until the maximum time limit has been reached. May return multiple
     * `StreamingTranslateSpeechResult`s with the `is_final` flag set to `true`.
     * If `true`, the speech translator will detect a single spoken utterance.
     * When it detects that the user has paused or stopped speaking, it will
     * return an `END_OF_SINGLE_UTTERANCE` event and cease translation.
     * When the client receives 'END_OF_SINGLE_UTTERANCE' event, the client should
     * stop sending the requests. However, clients should keep receiving remaining
     * responses until the stream is terminated. To construct the complete
     * sentence in a streaming way, one should override (if 'is_final' of previous
     * response is false), or append (if 'is_final' of previous response is true).
     *
     * Generated from protobuf field <code>bool single_utterance = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getSingleUtterance()
    {
        return $this->single_utterance;
    }

    /**
     * Optional. If `false` or omitted, the system performs
     * continuous translation (continuing to wait for and process audio even if
     * the user pauses speaking) until the client closes the input stream (gRPC
     * API) or until the maximum time limit has been reached. May return multiple
     * `StreamingTranslateSpeechResult`s with the `is_final` flag set to `true`.
     * If `true`, the speech translator will detect a single spoken utterance.
     * When it detects that the user has paused or stopped speaking, it will
     * return an `END_OF_SINGLE_UTTERANCE` event and cease translation.
     * When the client receives 'END_OF_SINGLE_UTTERANCE' event, the client should
     * stop sending the requests. However, clients should keep receiving remaining
     * responses until the stream is terminated. To construct the complete
     * sentence in a streaming way, one should override (if 'is_final' of previous
     * response is false), or append (if 'is_final' of previous response is true).
     *
     * Generated from protobuf field <code>bool single_utterance = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setSingleUtterance($var)
    {
        GPBUtil::checkBool($var);
        $this->single_utterance = $var;

        return $this;
    }

}

