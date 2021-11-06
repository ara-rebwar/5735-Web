<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/videointelligence/v1/video_intelligence.proto

namespace Google\Cloud\VideoIntelligence\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Explicit content annotation (based on per-frame visual signals only).
 * If no explicit content has been detected in a frame, no annotations are
 * present for that frame.
 *
 * Generated from protobuf message <code>google.cloud.videointelligence.v1.ExplicitContentAnnotation</code>
 */
class ExplicitContentAnnotation extends \Google\Protobuf\Internal\Message
{
    /**
     * All video frames where explicit content was detected.
     *
     * Generated from protobuf field <code>repeated .google.cloud.videointelligence.v1.ExplicitContentFrame frames = 1;</code>
     */
    private $frames;
    /**
     * Feature version.
     *
     * Generated from protobuf field <code>string version = 2;</code>
     */
    private $version = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\VideoIntelligence\V1\ExplicitContentFrame[]|\Google\Protobuf\Internal\RepeatedField $frames
     *           All video frames where explicit content was detected.
     *     @type string $version
     *           Feature version.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Videointelligence\V1\VideoIntelligence::initOnce();
        parent::__construct($data);
    }

    /**
     * All video frames where explicit content was detected.
     *
     * Generated from protobuf field <code>repeated .google.cloud.videointelligence.v1.ExplicitContentFrame frames = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFrames()
    {
        return $this->frames;
    }

    /**
     * All video frames where explicit content was detected.
     *
     * Generated from protobuf field <code>repeated .google.cloud.videointelligence.v1.ExplicitContentFrame frames = 1;</code>
     * @param \Google\Cloud\VideoIntelligence\V1\ExplicitContentFrame[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFrames($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\VideoIntelligence\V1\ExplicitContentFrame::class);
        $this->frames = $arr;

        return $this;
    }

    /**
     * Feature version.
     *
     * Generated from protobuf field <code>string version = 2;</code>
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Feature version.
     *
     * Generated from protobuf field <code>string version = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->version = $var;

        return $this;
    }

}

