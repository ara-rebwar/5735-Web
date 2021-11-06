<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/appengine/v1/deploy.proto

namespace Google\Cloud\AppEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Single source file that is part of the version to be deployed. Each source
 * file that is deployed must be specified separately.
 *
 * Generated from protobuf message <code>google.appengine.v1.FileInfo</code>
 */
class FileInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * URL source to use to fetch this file. Must be a URL to a resource in
     * Google Cloud Storage in the form
     * 'http(s)://storage.googleapis.com/\<bucket\>/\<object\>'.
     *
     * Generated from protobuf field <code>string source_url = 1;</code>
     */
    private $source_url = '';
    /**
     * The SHA1 hash of the file, in hex.
     *
     * Generated from protobuf field <code>string sha1_sum = 2;</code>
     */
    private $sha1_sum = '';
    /**
     * The MIME type of the file.
     * Defaults to the value from Google Cloud Storage.
     *
     * Generated from protobuf field <code>string mime_type = 3;</code>
     */
    private $mime_type = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $source_url
     *           URL source to use to fetch this file. Must be a URL to a resource in
     *           Google Cloud Storage in the form
     *           'http(s)://storage.googleapis.com/\<bucket\>/\<object\>'.
     *     @type string $sha1_sum
     *           The SHA1 hash of the file, in hex.
     *     @type string $mime_type
     *           The MIME type of the file.
     *           Defaults to the value from Google Cloud Storage.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Appengine\V1\Deploy::initOnce();
        parent::__construct($data);
    }

    /**
     * URL source to use to fetch this file. Must be a URL to a resource in
     * Google Cloud Storage in the form
     * 'http(s)://storage.googleapis.com/\<bucket\>/\<object\>'.
     *
     * Generated from protobuf field <code>string source_url = 1;</code>
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * URL source to use to fetch this file. Must be a URL to a resource in
     * Google Cloud Storage in the form
     * 'http(s)://storage.googleapis.com/\<bucket\>/\<object\>'.
     *
     * Generated from protobuf field <code>string source_url = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSourceUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->source_url = $var;

        return $this;
    }

    /**
     * The SHA1 hash of the file, in hex.
     *
     * Generated from protobuf field <code>string sha1_sum = 2;</code>
     * @return string
     */
    public function getSha1Sum()
    {
        return $this->sha1_sum;
    }

    /**
     * The SHA1 hash of the file, in hex.
     *
     * Generated from protobuf field <code>string sha1_sum = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setSha1Sum($var)
    {
        GPBUtil::checkString($var, True);
        $this->sha1_sum = $var;

        return $this;
    }

    /**
     * The MIME type of the file.
     * Defaults to the value from Google Cloud Storage.
     *
     * Generated from protobuf field <code>string mime_type = 3;</code>
     * @return string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * The MIME type of the file.
     * Defaults to the value from Google Cloud Storage.
     *
     * Generated from protobuf field <code>string mime_type = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setMimeType($var)
    {
        GPBUtil::checkString($var, True);
        $this->mime_type = $var;

        return $this;
    }

}

