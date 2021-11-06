<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recommender/v1/recommendation.proto

namespace GPBMetadata\Google\Cloud\Recommender\V1;

class Recommendation
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Type\Money::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/cloud/recommender/v1/recommendation.protogoogle.cloud.recommender.v1google/protobuf/duration.protogoogle/protobuf/struct.protogoogle/protobuf/timestamp.protogoogle/type/money.proto"�
Recommendation
name (	
description (	
recommender_subtype (	5
last_refresh_time (2.google.protobuf.Timestamp;
primary_impact (2#.google.cloud.recommender.v1.Impact>
additional_impact (2#.google.cloud.recommender.v1.ImpactC
content (22.google.cloud.recommender.v1.RecommendationContentH

state_info
 (24.google.cloud.recommender.v1.RecommendationStateInfo
etag (	Y
associated_insights (2<.google.cloud.recommender.v1.Recommendation.InsightReference#
InsightReference
insight (	:��A�
)recommender.googleapis.com/Recommendationcprojects/{project}/locations/{location}/recommenders/{recommender}/recommendations/{recommendation}rbillingAccounts/{billing_account}/locations/{location}/recommenders/{recommender}/recommendations/{recommendation}afolders/{folder}/locations/{location}/recommenders/{recommender}/recommendations/{recommendation}morganizations/{organization}/locations/{location}/recommenders/{recommender}/recommendations/{recommendation}"^
RecommendationContentE
operation_groups (2+.google.cloud.recommender.v1.OperationGroup"L
OperationGroup:

operations (2&.google.cloud.recommender.v1.Operation"�
	Operation
action (	
resource_type (	
resource (	
path (	
source_resource (	
source_path (	\'
value (2.google.protobuf.ValueH B
value_matcher
 (2).google.cloud.recommender.v1.ValueMatcherH M
path_filters (27.google.cloud.recommender.v1.Operation.PathFiltersEntryZ
path_value_matchers (2=.google.cloud.recommender.v1.Operation.PathValueMatchersEntryJ
PathFiltersEntry
key (	%
value (2.google.protobuf.Value:8c
PathValueMatchersEntry
key (	8
value (2).google.cloud.recommender.v1.ValueMatcher:8B

path_value":
ValueMatcher
matches_pattern (	H B
match_variant"_
CostProjection 
cost (2.google.type.Money+
duration (2.google.protobuf.Duration"�
Impact>
category (2,.google.cloud.recommender.v1.Impact.CategoryF
cost_projectiond (2+.google.cloud.recommender.v1.CostProjectionH "`
Category
CATEGORY_UNSPECIFIED 
COST
SECURITY
PERFORMANCE
MANAGEABILITYB

projection"�
RecommendationStateInfoI
state (2:.google.cloud.recommender.v1.RecommendationStateInfo.State_
state_metadata (2G.google.cloud.recommender.v1.RecommendationStateInfo.StateMetadataEntry4
StateMetadataEntry
key (	
value (	:8"a
State
STATE_UNSPECIFIED 

ACTIVE
CLAIMED
	SUCCEEDED

FAILED
	DISMISSEDB�
com.google.cloud.recommender.v1PZFgoogle.golang.org/genproto/googleapis/cloud/recommender/v1;recommender�CREC�Google.Cloud.Recommender.V1�A�
&recommender.googleapis.com/RecommenderBprojects/{project}/locations/{location}/recommenders/{recommender}QbillingAccounts/{billing_account}/locations/{location}/recommenders/{recommender}@folders/{folder}/locations/{location}/recommenders/{recommender}Lorganizations/{organization}/locations/{location}/recommenders/{recommender}bproto3'
        , true);

        static::$is_initialized = true;
    }
}

