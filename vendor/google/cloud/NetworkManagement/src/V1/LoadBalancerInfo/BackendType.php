<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networkmanagement/v1/trace.proto

namespace Google\Cloud\NetworkManagement\V1\LoadBalancerInfo;

use UnexpectedValueException;

/**
 * The type definition for a load balancer backend configuration:
 *
 * Protobuf type <code>google.cloud.networkmanagement.v1.LoadBalancerInfo.BackendType</code>
 */
class BackendType
{
    /**
     * Type is unspecified.
     *
     * Generated from protobuf enum <code>BACKEND_TYPE_UNSPECIFIED = 0;</code>
     */
    const BACKEND_TYPE_UNSPECIFIED = 0;
    /**
     * Backend Service as the load balancer's backend.
     *
     * Generated from protobuf enum <code>BACKEND_SERVICE = 1;</code>
     */
    const BACKEND_SERVICE = 1;
    /**
     * Target Pool as the load balancer's backend.
     *
     * Generated from protobuf enum <code>TARGET_POOL = 2;</code>
     */
    const TARGET_POOL = 2;

    private static $valueToName = [
        self::BACKEND_TYPE_UNSPECIFIED => 'BACKEND_TYPE_UNSPECIFIED',
        self::BACKEND_SERVICE => 'BACKEND_SERVICE',
        self::TARGET_POOL => 'TARGET_POOL',
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendType::class, \Google\Cloud\NetworkManagement\V1\LoadBalancerInfo_BackendType::class);
