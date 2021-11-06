<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/language/v1/language_service.proto

namespace Google\Cloud\Language\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The text annotations response message.
 *
 * Generated from protobuf message <code>google.cloud.language.v1.AnnotateTextResponse</code>
 */
class AnnotateTextResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Sentences in the input document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Sentence sentences = 1;</code>
     */
    private $sentences;
    /**
     * Tokens, along with their syntactic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Token tokens = 2;</code>
     */
    private $tokens;
    /**
     * Entities, along with their semantic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_entities][google.cloud.language.v1.AnnotateTextRequest.Features.extract_entities].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Entity entities = 3;</code>
     */
    private $entities;
    /**
     * The overall sentiment for the document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_document_sentiment][google.cloud.language.v1.AnnotateTextRequest.Features.extract_document_sentiment].
     *
     * Generated from protobuf field <code>.google.cloud.language.v1.Sentiment document_sentiment = 4;</code>
     */
    private $document_sentiment = null;
    /**
     * The language of the text, which will be the same as the language specified
     * in the request or, if not specified, the automatically-detected language.
     * See [Document.language][google.cloud.language.v1.Document.language] field for more details.
     *
     * Generated from protobuf field <code>string language = 5;</code>
     */
    private $language = '';
    /**
     * Categories identified in the input document.
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.ClassificationCategory categories = 6;</code>
     */
    private $categories;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Language\V1\Sentence[]|\Google\Protobuf\Internal\RepeatedField $sentences
     *           Sentences in the input document. Populated if the user enables
     *           [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *     @type \Google\Cloud\Language\V1\Token[]|\Google\Protobuf\Internal\RepeatedField $tokens
     *           Tokens, along with their syntactic information, in the input document.
     *           Populated if the user enables
     *           [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *     @type \Google\Cloud\Language\V1\Entity[]|\Google\Protobuf\Internal\RepeatedField $entities
     *           Entities, along with their semantic information, in the input document.
     *           Populated if the user enables
     *           [AnnotateTextRequest.Features.extract_entities][google.cloud.language.v1.AnnotateTextRequest.Features.extract_entities].
     *     @type \Google\Cloud\Language\V1\Sentiment $document_sentiment
     *           The overall sentiment for the document. Populated if the user enables
     *           [AnnotateTextRequest.Features.extract_document_sentiment][google.cloud.language.v1.AnnotateTextRequest.Features.extract_document_sentiment].
     *     @type string $language
     *           The language of the text, which will be the same as the language specified
     *           in the request or, if not specified, the automatically-detected language.
     *           See [Document.language][google.cloud.language.v1.Document.language] field for more details.
     *     @type \Google\Cloud\Language\V1\ClassificationCategory[]|\Google\Protobuf\Internal\RepeatedField $categories
     *           Categories identified in the input document.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Language\V1\LanguageService::initOnce();
        parent::__construct($data);
    }

    /**
     * Sentences in the input document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Sentence sentences = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSentences()
    {
        return $this->sentences;
    }

    /**
     * Sentences in the input document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Sentence sentences = 1;</code>
     * @param \Google\Cloud\Language\V1\Sentence[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSentences($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Language\V1\Sentence::class);
        $this->sentences = $arr;

        return $this;
    }

    /**
     * Tokens, along with their syntactic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Token tokens = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Tokens, along with their syntactic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_syntax][google.cloud.language.v1.AnnotateTextRequest.Features.extract_syntax].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Token tokens = 2;</code>
     * @param \Google\Cloud\Language\V1\Token[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTokens($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Language\V1\Token::class);
        $this->tokens = $arr;

        return $this;
    }

    /**
     * Entities, along with their semantic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_entities][google.cloud.language.v1.AnnotateTextRequest.Features.extract_entities].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Entity entities = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Entities, along with their semantic information, in the input document.
     * Populated if the user enables
     * [AnnotateTextRequest.Features.extract_entities][google.cloud.language.v1.AnnotateTextRequest.Features.extract_entities].
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.Entity entities = 3;</code>
     * @param \Google\Cloud\Language\V1\Entity[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEntities($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Language\V1\Entity::class);
        $this->entities = $arr;

        return $this;
    }

    /**
     * The overall sentiment for the document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_document_sentiment][google.cloud.language.v1.AnnotateTextRequest.Features.extract_document_sentiment].
     *
     * Generated from protobuf field <code>.google.cloud.language.v1.Sentiment document_sentiment = 4;</code>
     * @return \Google\Cloud\Language\V1\Sentiment|null
     */
    public function getDocumentSentiment()
    {
        return isset($this->document_sentiment) ? $this->document_sentiment : null;
    }

    public function hasDocumentSentiment()
    {
        return isset($this->document_sentiment);
    }

    public function clearDocumentSentiment()
    {
        unset($this->document_sentiment);
    }

    /**
     * The overall sentiment for the document. Populated if the user enables
     * [AnnotateTextRequest.Features.extract_document_sentiment][google.cloud.language.v1.AnnotateTextRequest.Features.extract_document_sentiment].
     *
     * Generated from protobuf field <code>.google.cloud.language.v1.Sentiment document_sentiment = 4;</code>
     * @param \Google\Cloud\Language\V1\Sentiment $var
     * @return $this
     */
    public function setDocumentSentiment($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Language\V1\Sentiment::class);
        $this->document_sentiment = $var;

        return $this;
    }

    /**
     * The language of the text, which will be the same as the language specified
     * in the request or, if not specified, the automatically-detected language.
     * See [Document.language][google.cloud.language.v1.Document.language] field for more details.
     *
     * Generated from protobuf field <code>string language = 5;</code>
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * The language of the text, which will be the same as the language specified
     * in the request or, if not specified, the automatically-detected language.
     * See [Document.language][google.cloud.language.v1.Document.language] field for more details.
     *
     * Generated from protobuf field <code>string language = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguage($var)
    {
        GPBUtil::checkString($var, True);
        $this->language = $var;

        return $this;
    }

    /**
     * Categories identified in the input document.
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.ClassificationCategory categories = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Categories identified in the input document.
     *
     * Generated from protobuf field <code>repeated .google.cloud.language.v1.ClassificationCategory categories = 6;</code>
     * @param \Google\Cloud\Language\V1\ClassificationCategory[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCategories($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Language\V1\ClassificationCategory::class);
        $this->categories = $arr;

        return $this;
    }

}

