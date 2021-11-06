<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networkconnectivity/v1/common.proto

namespace Google\Cloud\NetworkConnectivity\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents the metadata of the long-running operation.
 *
 * Generated from protobuf message <code>google.cloud.networkconnectivity.v1.OperationMetadata</code>
 */
class OperationMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The time the operation was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The time the operation finished running.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $end_time = null;
    /**
     * Output only. Server-defined resource path for the target of the operation.
     *
     * Generated from protobuf field <code>string target = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $target = '';
    /**
     * Output only. Name of the verb executed by the operation.
     *
     * Generated from protobuf field <code>string verb = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $verb = '';
    /**
     * Output only. Human-readable status of the operation, if any.
     *
     * Generated from protobuf field <code>string status_message = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $status_message = '';
    /**
     * Output only. Identifies whether the user has requested cancellation
     * of the operation. Operations that have been cancelled successfully
     * have [Operation.error][] value with a [google.rpc.Status.code][google.rpc.Status.code] of 1,
     * corresponding to `Code.CANCELLED`.
     *
     * Generated from protobuf field <code>bool requested_cancellation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $requested_cancellation = false;
    /**
     * Output only. API version used to start the operation.
     *
     * Generated from protobuf field <code>string api_version = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $api_version = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time the operation was created.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Output only. The time the operation finished running.
     *     @type string $target
     *           Output only. Server-defined resource path for the target of the operation.
     *     @type string $verb
     *           Output only. Name of the verb executed by the operation.
     *     @type string $status_message
     *           Output only. Human-readable status of the operation, if any.
     *     @type bool $requested_cancellation
     *           Output only. Identifies whether the user has requested cancellation
     *           of the operation. Operations that have been cancelled successfully
     *           have [Operation.error][] value with a [google.rpc.Status.code][google.rpc.Status.code] of 1,
     *           corresponding to `Code.CANCELLED`.
     *     @type string $api_version
     *           Output only. API version used to start the operation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Networkconnectivity\V1\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The time the operation was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return isset($this->create_time) ? $this->create_time : null;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. The time the operation was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. The time the operation finished running.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getEndTime()
    {
        return isset($this->end_time) ? $this->end_time : null;
    }

    public function hasEndTime()
    {
        return isset($this->end_time);
    }

    public function clearEndTime()
    {
        unset($this->end_time);
    }

    /**
     * Output only. The time the operation finished running.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setEndTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->end_time = $var;

        return $this;
    }

    /**
     * Output only. Server-defined resource path for the target of the operation.
     *
     * Generated from protobuf field <code>string target = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Output only. Server-defined resource path for the target of the operation.
     *
     * Generated from protobuf field <code>string target = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setTarget($var)
    {
        GPBUtil::checkString($var, True);
        $this->target = $var;

        return $this;
    }

    /**
     * Output only. Name of the verb executed by the operation.
     *
     * Generated from protobuf field <code>string verb = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * Output only. Name of the verb executed by the operation.
     *
     * Generated from protobuf field <code>string verb = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setVerb($var)
    {
        GPBUtil::checkString($var, True);
        $this->verb = $var;

        return $this;
    }

    /**
     * Output only. Human-readable status of the operation, if any.
     *
     * Generated from protobuf field <code>string status_message = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->status_message;
    }

    /**
     * Output only. Human-readable status of the operation, if any.
     *
     * Generated from protobuf field <code>string status_message = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStatusMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->status_message = $var;

        return $this;
    }

    /**
     * Output only. Identifies whether the user has requested cancellation
     * of the operation. Operations that have been cancelled successfully
     * have [Operation.error][] value with a [google.rpc.Status.code][google.rpc.Status.code] of 1,
     * corresponding to `Code.CANCELLED`.
     *
     * Generated from protobuf field <code>bool requested_cancellation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getRequestedCancellation()
    {
        return $this->requested_cancellation;
    }

    /**
     * Output only. Identifies whether the user has requested cancellation
     * of the operation. Operations that have been cancelled successfully
     * have [Operation.error][] value with a [google.rpc.Status.code][google.rpc.Status.code] of 1,
     * corresponding to `Code.CANCELLED`.
     *
     * Generated from protobuf field <code>bool requested_cancellation = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setRequestedCancellation($var)
    {
        GPBUtil::checkBool($var);
        $this->requested_cancellation = $var;

        return $this;
    }

    /**
     * Output only. API version used to start the operation.
     *
     * Generated from protobuf field <code>string api_version = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getApiVersion()
    {
        return $this->api_version;
    }

    /**
     * Output only. API version used to start the operation.
     *
     * Generated from protobuf field <code>string api_version = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setApiVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->api_version = $var;

        return $this;
    }

}

