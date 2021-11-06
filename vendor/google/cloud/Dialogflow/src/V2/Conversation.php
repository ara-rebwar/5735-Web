<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/conversation.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a conversation.
 * A conversation is an interaction between an agent, including live agents
 * and Dialogflow agents, and a support customer. Conversations can
 * include phone calls and text-based chat sessions.
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.Conversation</code>
 */
class Conversation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The unique identifier of this conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Output only. The current state of the Conversation.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.LifecycleState lifecycle_state = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $lifecycle_state = 0;
    /**
     * Required. The Conversation Profile to be used to configure this
     * Conversation. This field cannot be updated.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversationProfiles/<Conversation Profile ID>`.
     *
     * Generated from protobuf field <code>string conversation_profile = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $conversation_profile = '';
    /**
     * Output only. It will not be empty if the conversation is to be connected over
     * telephony.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.ConversationPhoneNumber phone_number = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $phone_number = null;
    /**
     * Output only. The time the conversation was started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $start_time = null;
    /**
     * Output only. The time the conversation was finished.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $end_time = null;
    /**
     * The stage of a conversation. It indicates whether the virtual agent or a
     * human agent is handling the conversation.
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set, defaults to
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE]; Otherwise, defaults to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set but explicitly sets conversation_stage to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE], it skips
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE] stage and directly goes to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.ConversationStage conversation_stage = 7;</code>
     */
    private $conversation_stage = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The unique identifier of this conversation.
     *           Format: `projects/<Project ID>/locations/<Location
     *           ID>/conversations/<Conversation ID>`.
     *     @type int $lifecycle_state
     *           Output only. The current state of the Conversation.
     *     @type string $conversation_profile
     *           Required. The Conversation Profile to be used to configure this
     *           Conversation. This field cannot be updated.
     *           Format: `projects/<Project ID>/locations/<Location
     *           ID>/conversationProfiles/<Conversation Profile ID>`.
     *     @type \Google\Cloud\Dialogflow\V2\ConversationPhoneNumber $phone_number
     *           Output only. It will not be empty if the conversation is to be connected over
     *           telephony.
     *     @type \Google\Protobuf\Timestamp $start_time
     *           Output only. The time the conversation was started.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Output only. The time the conversation was finished.
     *     @type int $conversation_stage
     *           The stage of a conversation. It indicates whether the virtual agent or a
     *           human agent is handling the conversation.
     *           If the conversation is created with the conversation profile that has
     *           Dialogflow config set, defaults to
     *           [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE]; Otherwise, defaults to
     *           [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     *           If the conversation is created with the conversation profile that has
     *           Dialogflow config set but explicitly sets conversation_stage to
     *           [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE], it skips
     *           [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE] stage and directly goes to
     *           [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Conversation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The unique identifier of this conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The unique identifier of this conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. The current state of the Conversation.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.LifecycleState lifecycle_state = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getLifecycleState()
    {
        return $this->lifecycle_state;
    }

    /**
     * Output only. The current state of the Conversation.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.LifecycleState lifecycle_state = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setLifecycleState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dialogflow\V2\Conversation\LifecycleState::class);
        $this->lifecycle_state = $var;

        return $this;
    }

    /**
     * Required. The Conversation Profile to be used to configure this
     * Conversation. This field cannot be updated.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversationProfiles/<Conversation Profile ID>`.
     *
     * Generated from protobuf field <code>string conversation_profile = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getConversationProfile()
    {
        return $this->conversation_profile;
    }

    /**
     * Required. The Conversation Profile to be used to configure this
     * Conversation. This field cannot be updated.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversationProfiles/<Conversation Profile ID>`.
     *
     * Generated from protobuf field <code>string conversation_profile = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setConversationProfile($var)
    {
        GPBUtil::checkString($var, True);
        $this->conversation_profile = $var;

        return $this;
    }

    /**
     * Output only. It will not be empty if the conversation is to be connected over
     * telephony.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.ConversationPhoneNumber phone_number = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Dialogflow\V2\ConversationPhoneNumber|null
     */
    public function getPhoneNumber()
    {
        return isset($this->phone_number) ? $this->phone_number : null;
    }

    public function hasPhoneNumber()
    {
        return isset($this->phone_number);
    }

    public function clearPhoneNumber()
    {
        unset($this->phone_number);
    }

    /**
     * Output only. It will not be empty if the conversation is to be connected over
     * telephony.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.ConversationPhoneNumber phone_number = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Dialogflow\V2\ConversationPhoneNumber $var
     * @return $this
     */
    public function setPhoneNumber($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\ConversationPhoneNumber::class);
        $this->phone_number = $var;

        return $this;
    }

    /**
     * Output only. The time the conversation was started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time the conversation was started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time the conversation was finished.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time the conversation was finished.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * The stage of a conversation. It indicates whether the virtual agent or a
     * human agent is handling the conversation.
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set, defaults to
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE]; Otherwise, defaults to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set but explicitly sets conversation_stage to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE], it skips
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE] stage and directly goes to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.ConversationStage conversation_stage = 7;</code>
     * @return int
     */
    public function getConversationStage()
    {
        return $this->conversation_stage;
    }

    /**
     * The stage of a conversation. It indicates whether the virtual agent or a
     * human agent is handling the conversation.
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set, defaults to
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE]; Otherwise, defaults to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     * If the conversation is created with the conversation profile that has
     * Dialogflow config set but explicitly sets conversation_stage to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE], it skips
     * [ConversationStage.VIRTUAL_AGENT_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.VIRTUAL_AGENT_STAGE] stage and directly goes to
     * [ConversationStage.HUMAN_ASSIST_STAGE][google.cloud.dialogflow.v2.Conversation.ConversationStage.HUMAN_ASSIST_STAGE].
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Conversation.ConversationStage conversation_stage = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setConversationStage($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dialogflow\V2\Conversation\ConversationStage::class);
        $this->conversation_stage = $var;

        return $this;
    }

}

