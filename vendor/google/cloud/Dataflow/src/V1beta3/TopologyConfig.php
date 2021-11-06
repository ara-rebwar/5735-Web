<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/dataflow/v1beta3/streaming.proto

namespace Google\Cloud\Dataflow\V1beta3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Global topology of the streaming Dataflow job, including all
 * computations and their sharded locations.
 *
 * Generated from protobuf message <code>google.dataflow.v1beta3.TopologyConfig</code>
 */
class TopologyConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The computations associated with a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.ComputationTopology computations = 1;</code>
     */
    private $computations;
    /**
     * The disks assigned to a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.DataDiskAssignment data_disk_assignments = 2;</code>
     */
    private $data_disk_assignments;
    /**
     * Maps user stage names to stable computation names.
     *
     * Generated from protobuf field <code>map<string, string> user_stage_to_computation_name_map = 3;</code>
     */
    private $user_stage_to_computation_name_map;
    /**
     * The size (in bits) of keys that will be assigned to source messages.
     *
     * Generated from protobuf field <code>int32 forwarding_key_bits = 4;</code>
     */
    private $forwarding_key_bits = 0;
    /**
     * Version number for persistent state.
     *
     * Generated from protobuf field <code>int32 persistent_state_version = 5;</code>
     */
    private $persistent_state_version = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Dataflow\V1beta3\ComputationTopology[]|\Google\Protobuf\Internal\RepeatedField $computations
     *           The computations associated with a streaming Dataflow job.
     *     @type \Google\Cloud\Dataflow\V1beta3\DataDiskAssignment[]|\Google\Protobuf\Internal\RepeatedField $data_disk_assignments
     *           The disks assigned to a streaming Dataflow job.
     *     @type array|\Google\Protobuf\Internal\MapField $user_stage_to_computation_name_map
     *           Maps user stage names to stable computation names.
     *     @type int $forwarding_key_bits
     *           The size (in bits) of keys that will be assigned to source messages.
     *     @type int $persistent_state_version
     *           Version number for persistent state.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Dataflow\V1Beta3\Streaming::initOnce();
        parent::__construct($data);
    }

    /**
     * The computations associated with a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.ComputationTopology computations = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getComputations()
    {
        return $this->computations;
    }

    /**
     * The computations associated with a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.ComputationTopology computations = 1;</code>
     * @param \Google\Cloud\Dataflow\V1beta3\ComputationTopology[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setComputations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dataflow\V1beta3\ComputationTopology::class);
        $this->computations = $arr;

        return $this;
    }

    /**
     * The disks assigned to a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.DataDiskAssignment data_disk_assignments = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDataDiskAssignments()
    {
        return $this->data_disk_assignments;
    }

    /**
     * The disks assigned to a streaming Dataflow job.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.DataDiskAssignment data_disk_assignments = 2;</code>
     * @param \Google\Cloud\Dataflow\V1beta3\DataDiskAssignment[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDataDiskAssignments($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dataflow\V1beta3\DataDiskAssignment::class);
        $this->data_disk_assignments = $arr;

        return $this;
    }

    /**
     * Maps user stage names to stable computation names.
     *
     * Generated from protobuf field <code>map<string, string> user_stage_to_computation_name_map = 3;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getUserStageToComputationNameMap()
    {
        return $this->user_stage_to_computation_name_map;
    }

    /**
     * Maps user stage names to stable computation names.
     *
     * Generated from protobuf field <code>map<string, string> user_stage_to_computation_name_map = 3;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setUserStageToComputationNameMap($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->user_stage_to_computation_name_map = $arr;

        return $this;
    }

    /**
     * The size (in bits) of keys that will be assigned to source messages.
     *
     * Generated from protobuf field <code>int32 forwarding_key_bits = 4;</code>
     * @return int
     */
    public function getForwardingKeyBits()
    {
        return $this->forwarding_key_bits;
    }

    /**
     * The size (in bits) of keys that will be assigned to source messages.
     *
     * Generated from protobuf field <code>int32 forwarding_key_bits = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setForwardingKeyBits($var)
    {
        GPBUtil::checkInt32($var);
        $this->forwarding_key_bits = $var;

        return $this;
    }

    /**
     * Version number for persistent state.
     *
     * Generated from protobuf field <code>int32 persistent_state_version = 5;</code>
     * @return int
     */
    public function getPersistentStateVersion()
    {
        return $this->persistent_state_version;
    }

    /**
     * Version number for persistent state.
     *
     * Generated from protobuf field <code>int32 persistent_state_version = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setPersistentStateVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->persistent_state_version = $var;

        return $this;
    }

}

