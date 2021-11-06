<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/patch_deployments.proto

namespace Google\Cloud\OsConfig\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Sets the time for recurring patch deployments.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.RecurringSchedule</code>
 */
class RecurringSchedule extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Defines the time zone that `time_of_day` is relative to.
     * The rules for daylight saving time are determined by the chosen time zone.
     *
     * Generated from protobuf field <code>.google.type.TimeZone time_zone = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $time_zone = null;
    /**
     * Optional. The time that the recurring schedule becomes effective.
     * Defaults to `create_time` of the patch deployment.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $start_time = null;
    /**
     * Optional. The end time at which a recurring patch deployment schedule is no
     * longer active.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $end_time = null;
    /**
     * Required. Time of the day to run a recurring deployment.
     *
     * Generated from protobuf field <code>.google.type.TimeOfDay time_of_day = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $time_of_day = null;
    /**
     * Required. The frequency unit of this recurring schedule.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.RecurringSchedule.Frequency frequency = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $frequency = 0;
    /**
     * Output only. The time the last patch job ran successfully.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_execute_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $last_execute_time = null;
    /**
     * Output only. The time the next patch job is scheduled to run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp next_execute_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $next_execute_time = null;
    protected $schedule_config;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Type\TimeZone $time_zone
     *           Required. Defines the time zone that `time_of_day` is relative to.
     *           The rules for daylight saving time are determined by the chosen time zone.
     *     @type \Google\Protobuf\Timestamp $start_time
     *           Optional. The time that the recurring schedule becomes effective.
     *           Defaults to `create_time` of the patch deployment.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Optional. The end time at which a recurring patch deployment schedule is no
     *           longer active.
     *     @type \Google\Type\TimeOfDay $time_of_day
     *           Required. Time of the day to run a recurring deployment.
     *     @type int $frequency
     *           Required. The frequency unit of this recurring schedule.
     *     @type \Google\Cloud\OsConfig\V1\WeeklySchedule $weekly
     *           Required. Schedule with weekly executions.
     *     @type \Google\Cloud\OsConfig\V1\MonthlySchedule $monthly
     *           Required. Schedule with monthly executions.
     *     @type \Google\Protobuf\Timestamp $last_execute_time
     *           Output only. The time the last patch job ran successfully.
     *     @type \Google\Protobuf\Timestamp $next_execute_time
     *           Output only. The time the next patch job is scheduled to run.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\PatchDeployments::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Defines the time zone that `time_of_day` is relative to.
     * The rules for daylight saving time are determined by the chosen time zone.
     *
     * Generated from protobuf field <code>.google.type.TimeZone time_zone = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Type\TimeZone|null
     */
    public function getTimeZone()
    {
        return isset($this->time_zone) ? $this->time_zone : null;
    }

    public function hasTimeZone()
    {
        return isset($this->time_zone);
    }

    public function clearTimeZone()
    {
        unset($this->time_zone);
    }

    /**
     * Required. Defines the time zone that `time_of_day` is relative to.
     * The rules for daylight saving time are determined by the chosen time zone.
     *
     * Generated from protobuf field <code>.google.type.TimeZone time_zone = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Type\TimeZone $var
     * @return $this
     */
    public function setTimeZone($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\TimeZone::class);
        $this->time_zone = $var;

        return $this;
    }

    /**
     * Optional. The time that the recurring schedule becomes effective.
     * Defaults to `create_time` of the patch deployment.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getStartTime()
    {
        return isset($this->start_time) ? $this->start_time : null;
    }

    public function hasStartTime()
    {
        return isset($this->start_time);
    }

    public function clearStartTime()
    {
        unset($this->start_time);
    }

    /**
     * Optional. The time that the recurring schedule becomes effective.
     * Defaults to `create_time` of the patch deployment.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->start_time = $var;

        return $this;
    }

    /**
     * Optional. The end time at which a recurring patch deployment schedule is no
     * longer active.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     * Optional. The end time at which a recurring patch deployment schedule is no
     * longer active.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     * Required. Time of the day to run a recurring deployment.
     *
     * Generated from protobuf field <code>.google.type.TimeOfDay time_of_day = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Type\TimeOfDay|null
     */
    public function getTimeOfDay()
    {
        return isset($this->time_of_day) ? $this->time_of_day : null;
    }

    public function hasTimeOfDay()
    {
        return isset($this->time_of_day);
    }

    public function clearTimeOfDay()
    {
        unset($this->time_of_day);
    }

    /**
     * Required. Time of the day to run a recurring deployment.
     *
     * Generated from protobuf field <code>.google.type.TimeOfDay time_of_day = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Type\TimeOfDay $var
     * @return $this
     */
    public function setTimeOfDay($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\TimeOfDay::class);
        $this->time_of_day = $var;

        return $this;
    }

    /**
     * Required. The frequency unit of this recurring schedule.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.RecurringSchedule.Frequency frequency = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Required. The frequency unit of this recurring schedule.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.RecurringSchedule.Frequency frequency = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setFrequency($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\OsConfig\V1\RecurringSchedule\Frequency::class);
        $this->frequency = $var;

        return $this;
    }

    /**
     * Required. Schedule with weekly executions.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.WeeklySchedule weekly = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\OsConfig\V1\WeeklySchedule|null
     */
    public function getWeekly()
    {
        return $this->readOneof(6);
    }

    public function hasWeekly()
    {
        return $this->hasOneof(6);
    }

    /**
     * Required. Schedule with weekly executions.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.WeeklySchedule weekly = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\OsConfig\V1\WeeklySchedule $var
     * @return $this
     */
    public function setWeekly($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsConfig\V1\WeeklySchedule::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Required. Schedule with monthly executions.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.MonthlySchedule monthly = 7 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\OsConfig\V1\MonthlySchedule|null
     */
    public function getMonthly()
    {
        return $this->readOneof(7);
    }

    public function hasMonthly()
    {
        return $this->hasOneof(7);
    }

    /**
     * Required. Schedule with monthly executions.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.MonthlySchedule monthly = 7 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\OsConfig\V1\MonthlySchedule $var
     * @return $this
     */
    public function setMonthly($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsConfig\V1\MonthlySchedule::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Output only. The time the last patch job ran successfully.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_execute_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getLastExecuteTime()
    {
        return isset($this->last_execute_time) ? $this->last_execute_time : null;
    }

    public function hasLastExecuteTime()
    {
        return isset($this->last_execute_time);
    }

    public function clearLastExecuteTime()
    {
        unset($this->last_execute_time);
    }

    /**
     * Output only. The time the last patch job ran successfully.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_execute_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setLastExecuteTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->last_execute_time = $var;

        return $this;
    }

    /**
     * Output only. The time the next patch job is scheduled to run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp next_execute_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getNextExecuteTime()
    {
        return isset($this->next_execute_time) ? $this->next_execute_time : null;
    }

    public function hasNextExecuteTime()
    {
        return isset($this->next_execute_time);
    }

    public function clearNextExecuteTime()
    {
        unset($this->next_execute_time);
    }

    /**
     * Output only. The time the next patch job is scheduled to run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp next_execute_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setNextExecuteTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->next_execute_time = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleConfig()
    {
        return $this->whichOneof("schedule_config");
    }

}

