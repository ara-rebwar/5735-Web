<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gaming/v1/game_server_deployments.proto

namespace Google\Cloud\Gaming\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for GameServerDeploymentsService.CreateGameServerDeployment.
 *
 * Generated from protobuf message <code>google.cloud.gaming.v1.CreateGameServerDeploymentRequest</code>
 */
class CreateGameServerDeploymentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The parent resource name. Uses the form:
     * `projects/{project}/locations/{location}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The ID of the game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>string deployment_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $deployment_id = '';
    /**
     * Required. The game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.GameServerDeployment game_server_deployment = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $game_server_deployment = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The parent resource name. Uses the form:
     *           `projects/{project}/locations/{location}`.
     *     @type string $deployment_id
     *           Required. The ID of the game server delpoyment resource to be created.
     *     @type \Google\Cloud\Gaming\V1\GameServerDeployment $game_server_deployment
     *           Required. The game server delpoyment resource to be created.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gaming\V1\GameServerDeployments::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The parent resource name. Uses the form:
     * `projects/{project}/locations/{location}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The parent resource name. Uses the form:
     * `projects/{project}/locations/{location}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The ID of the game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>string deployment_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDeploymentId()
    {
        return $this->deployment_id;
    }

    /**
     * Required. The ID of the game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>string deployment_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDeploymentId($var)
    {
        GPBUtil::checkString($var, True);
        $this->deployment_id = $var;

        return $this;
    }

    /**
     * Required. The game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.GameServerDeployment game_server_deployment = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Gaming\V1\GameServerDeployment|null
     */
    public function getGameServerDeployment()
    {
        return isset($this->game_server_deployment) ? $this->game_server_deployment : null;
    }

    public function hasGameServerDeployment()
    {
        return isset($this->game_server_deployment);
    }

    public function clearGameServerDeployment()
    {
        unset($this->game_server_deployment);
    }

    /**
     * Required. The game server delpoyment resource to be created.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.GameServerDeployment game_server_deployment = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Gaming\V1\GameServerDeployment $var
     * @return $this
     */
    public function setGameServerDeployment($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Gaming\V1\GameServerDeployment::class);
        $this->game_server_deployment = $var;

        return $this;
    }

}

