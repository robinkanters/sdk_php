<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Model\BunqModel;

/**
 * Manage the IPs which may be used for a credential of a user for server
 * authentication.
 *
 * @generated
 */
class PermittedIp extends BunqModel
{
    /**
     * Field constants.
     */
    const FIELD_IP = 'ip';
    const FIELD_STATUS = 'status';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/credential-password-ip/%s/ip/%s';
    const ENDPOINT_URL_CREATE = 'user/%s/credential-password-ip/%s/ip';
    const ENDPOINT_URL_LISTING = 'user/%s/credential-password-ip/%s/ip';
    const ENDPOINT_URL_UPDATE = 'user/%s/credential-password-ip/%s/ip/%s';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'PermittedIp';

    /**
     * The IP address.
     *
     * @var string
     */
    protected $ip;

    /**
     * The status of the IP. May be "ACTIVE" or "INACTIVE". It is only possible
     * to make requests from "ACTIVE" IP addresses. Only "ACTIVE" IPs will be
     * billed.
     *
     * @var string
     */
    protected $status;

    /**
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $credentialPasswordIpId
     * @param int $permittedIpId
     * @param string[] $customHeaders
     *
     * @return BunqModel|PermittedIp
     */
    public static function get(ApiContext $apiContext, $userId, $credentialPasswordIpId, $permittedIpId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $credentialPasswordIpId, $permittedIpId]
            ),
            $customHeaders
        );

        return static::fromJson($response);
    }

    /**
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param int $credentialPasswordIpId
     * @param string[] $customHeaders
     *
     * @return int
     */
    public static function create(ApiContext $apiContext, array $requestMap, $userId, $credentialPasswordIpId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [$userId, $credentialPasswordIpId]
            ),
            $requestMap,
            $customHeaders
        );

        return static::processForId($response);
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $credentialPasswordIpId
     * @param string[] $customHeaders
     *
     * @return BunqModel[]|PermittedIp[]
     */
    public static function listing(ApiContext $apiContext, $userId, $credentialPasswordIpId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId, $credentialPasswordIpId]
            ),
            $customHeaders
        );

        return static::fromJsonList($response, self::OBJECT_TYPE);
    }

    /**
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param int $credentialPasswordIpId
     * @param int $permittedIpId
     * @param string[] $customHeaders
     *
     * @return int
     */
    public static function update(ApiContext $apiContext, array $requestMap, $userId, $credentialPasswordIpId, $permittedIpId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->put(
            vsprintf(
                self::ENDPOINT_URL_UPDATE,
                [$userId, $credentialPasswordIpId, $permittedIpId]
            ),
            $requestMap,
            $customHeaders
        );

        return static::processForId($response);
    }

    /**
     * The IP address.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * The status of the IP. May be "ACTIVE" or "INACTIVE". It is only possible
     * to make requests from "ACTIVE" IP addresses. Only "ACTIVE" IPs will be
     * billed.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
