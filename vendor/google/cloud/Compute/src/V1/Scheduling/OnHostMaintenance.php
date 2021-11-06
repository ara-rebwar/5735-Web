<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\Scheduling;

use UnexpectedValueException;

/**
 * Defines the maintenance behavior for this instance. For standard instances, the default behavior is MIGRATE. For preemptible instances, the default and only possible behavior is TERMINATE. For more information, see Setting Instance Scheduling Options.
 *
 * Protobuf type <code>google.cloud.compute.v1.Scheduling.OnHostMaintenance</code>
 */
class OnHostMaintenance
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_ON_HOST_MAINTENANCE = 0;</code>
     */
    const UNDEFINED_ON_HOST_MAINTENANCE = 0;
    /**
     * Generated from protobuf enum <code>MIGRATE = 165699979;</code>
     */
    const MIGRATE = 165699979;
    /**
     * Generated from protobuf enum <code>TERMINATE = 527617601;</code>
     */
    const TERMINATE = 527617601;

    private static $valueToName = [
        self::UNDEFINED_ON_HOST_MAINTENANCE => 'UNDEFINED_ON_HOST_MAINTENANCE',
        self::MIGRATE => 'MIGRATE',
        self::TERMINATE => 'TERMINATE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


