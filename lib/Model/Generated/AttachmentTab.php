<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Model\BunqModel;
use bunq\Model\Generated\Object\Attachment;

/**
 * This call is used to upload an attachment that will be accessible only
 * through tabs. This can be used for example to upload special promotions
 * or other attachments. Attachments supported are png, jpg and gif.
 *
 * @generated
 */
class AttachmentTab extends BunqModel
{
    /**
     * Binary constants.
     */
    const FIELD_BODY = ApiClient::FIELD_BODY;
    const FIELD_CONTENT_TYPE = ApiClient::FIELD_CONTENT_TYPE;
    const FIELD_DESCRIPTION = ApiClient::FIELD_DESCRIPTION;

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/monetary-account/%s/attachment-tab';
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/attachment-tab/%s';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'AttachmentTab';

    /**
     * The id of the attachment.
     *
     * @var int
     */
    protected $id;

    /**
     * The timestamp of the attachment's creation.
     *
     * @var string
     */
    protected $created;

    /**
     * The timestamp of the attachment's last update.
     *
     * @var string
     */
    protected $updated;

    /**
     * The attachment.
     *
     * @var Attachment
     */
    protected $attachment;

    /**
     * Upload a new attachment to use with a tab, and to read its metadata.
     * Create a POST request with a payload that contains the binary
     * representation of the file, without any JSON wrapping. Make sure you
     * define the MIME type (i.e. image/jpeg) in the Content-Type header. You
     * are required to provide a description of the attachment using the
     * X-Bunq-Attachment-Description header.
     *
     * @param ApiContext $apiContext
     * @param string $requestBytes
     * @param int $userId
     * @param int $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return int
     */
    public static function create(ApiContext $apiContext, $requestBytes, $userId, $monetaryAccountId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $apiClient->enableBinary();
        $response = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [$userId, $monetaryAccountId]
            ),
            $requestBytes,
            $customHeaders
        );

        return static::processForId($response);
    }

    /**
     * Get a specific attachment. The header of the response contains the
     * content-type of the attachment.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $attachmentTabId
     * @param string[] $customHeaders
     *
     * @return BunqModel|AttachmentTab
     */
    public static function get(ApiContext $apiContext, $userId, $monetaryAccountId, $attachmentTabId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $monetaryAccountId, $attachmentTabId]
            ),
            $customHeaders
        );

        return static::fromJson($response);
    }

    /**
     * The id of the attachment.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * The timestamp of the attachment's creation.
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * The timestamp of the attachment's last update.
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param string $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * The attachment.
     *
     * @return Attachment
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param Attachment $attachment
     */
    public function setAttachment(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }
}
