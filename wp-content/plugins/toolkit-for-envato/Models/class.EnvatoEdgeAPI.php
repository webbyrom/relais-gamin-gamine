<?php
/**
 * Envato Edge API class
 * @note - Keep in mind that the ApiKey here is different to the Personal Tokens
 *         The Api Key are generated in Envato Profile Settings
 * @package Envato Toolkit
 * @author KestutisIT
 * @copyright KestutisIT
 * @license MIT License
 */
namespace EnvatoToolkit\Models;

class EnvatoEdgeAPI
{
    const VERSION = '1.3';
    const API_AGENT = 'EnvatoToolkit/%s';

    protected $debugMode 	            = 0;
    protected $debugMessages            = array();
    protected $okayMessages             = array();
    protected $errorMessages            = array();
    protected $username                 = '';
    protected $apiKey                   = '';

    public function __construct($paramUsername, $paramAPIKey)
    {
        $this->username = sanitize_text_field($paramUsername);
        $this->apiKey = sanitize_text_field($paramAPIKey);
    }

    /**
     * You cannot clone this class.
     * @codeCoverageIgnore
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, esc_html__('Cloning is not allowed.', 'envato-toolkit'), static::VERSION);
    }

    /**
     * You cannot clone this class.
     * @codeCoverageIgnore
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, esc_html__('Wake-up is not allowed.', 'envato-toolkit'), static::VERSION);
    }

    public function inDebug()
    {
        return ($this->debugMode >= 1 ? TRUE : FALSE);
    }

    public function flushMessages()
    {
        $this->debugMessages = array();
        $this->okayMessages = array();
        $this->errorMessages = array();
    }

    public function getAllMessages()
    {
        return array(
            'debug' => $this->debugMessages,
            'okay' => $this->okayMessages,
            'error' => $this->errorMessages,
        );
    }

    public function getDebugMessages()
    {
        return $this->debugMessages;
    }

    public function getOkayMessages()
    {
        return $this->okayMessages;
    }

    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    /**
     * Verify the purchase code. Keep in mind that the ApiKey here is different to the Personal Tokens
     * The Api Key are generated in Envato Profile Settings
     * @param $paramPurchaseCode
     * @return array|FALSE
     */
    public function getLicenseDetails($paramPurchaseCode)
    {
        $licenseDetails = FALSE;
        $sanitizedPurchaseCode = sanitize_text_field($paramPurchaseCode);

        // Open cURL channel
        $ch = curl_init();

        // Set cURL options
        $url = "http://marketplace.envato.com/api/edge/".$this->username."/".$this->apiKey."/verify-purchase:".$sanitizedPurchaseCode.".json";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Set the user agent
        curl_setopt($ch, CURLOPT_USERAGENT, sprintf(static::API_AGENT, static::VERSION));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // wait for connection in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 20); // timeout in seconds
        // Decode returned JSON
        $output = json_decode(curl_exec($ch), true);

        if($this->debugMode)
        {
            $debugMessage = '(Edge API Hit) Request Url: '.esc_url_raw($url);
            echo '<br />'.$debugMessage;
            $this->debugMessages[] = $debugMessage;
        }

        /* Example $output result:
         *  Array (
         *      [verify-purchase] => Array (
         *          [item_name] => "Great Plugin for Universal Use"
         *          [item_id] => 5001000
         *          [created_at] => Tue Jun 09 20:00:00 +1100 2015
         *          [supported_until] => Tue Jun 09 20:00:00 +1100 2017
         *          [buyer] => CUSTOMER_ENVATO_USERNAME
         *          [licence] => Regular License
         *      )
         * )
         */

        // Close Channel
        curl_close($ch);

        if(isset($output['verify-purchase']) && sizeof($output['verify-purchase']) > 0)
        {
            $licenseDetails = $this->normalizeLicense($output['verify-purchase'], $sanitizedPurchaseCode);
        } else
        {
            $this->errorMessages[] = sprintf(__('\'verify-purchase\' key is empty or not exist', 'envato-toolkit'), esc_url_raw($url));
            $this->errorMessages[] = sprintf(__('Failed URL: %s', 'envato-toolkit'), esc_url_raw($url));
        }

        return $licenseDetails;
    }

    /**
     * Normalize a license.
     * @note   it should match the MarketAPI normalizeLicense method
     * @param  array $paramPurchase An array of API request values.
     * @param  string $paramPurchaseCode Purchase code.
     * @return array A normalized array of values.
     */
    public function normalizeLicense(array $paramPurchase, $paramPurchaseCode)
    {
        $normalizedLicense = array(
            'buyer_username' => (!empty($paramPurchase['buyer']) ? $paramPurchase['buyer'] : ''),
            'envato_item_id' => $paramPurchase['item_id'],
            'envato_item_name' => (!empty($paramPurchase['item_name']) ? $paramPurchase['item_name'] : ''),
            // The 'misspell' of 'licence' instead of 'license' here is left by Envato and applies only for Edge API
            'license' => (!empty($paramPurchase['licence']) ? $paramPurchase['licence'] : ''),
            'license_sold' => (!empty($paramPurchase['created_at']) ? $paramPurchase['created_at'] : ''),
            'license_supported' => (!empty($paramPurchase['supported_until']) ? $paramPurchase['supported_until'] : ''),
            'purchase_code' => sanitize_text_field($paramPurchaseCode),
        );

        $licenseType = "";
        if($normalizedLicense['license'] == "Regular License")
        {
            $licenseType = "REGULAR";
        } else if($normalizedLicense['license'] == "Extended License")
        {
            $licenseType = "EXTENDED";
        }

        $normalizedLicense['license_type'] = $licenseType;
        $normalizedLicense['license_purchase_date'] = (new \DateTime($normalizedLicense['license_sold']))->format('Y-m-d');
        $normalizedLicense['license_purchase_time'] = (new \DateTime($normalizedLicense['license_sold']))->format('H:i:s');
        $normalizedLicense['support_expiration_date'] = (new \DateTime($normalizedLicense['license_supported']))->format('Y-m-d');
        $normalizedLicense['support_expiration_time'] = (new \DateTime($normalizedLicense['license_supported']))->format('H:i:s');
        if((new \DateTime($normalizedLicense['license_supported']))->getTimestamp() < (new \DateTime('now'))->getTimestamp())
        {
            // Already expired
            $normalizedLicense['support_active'] = 0;
        } else
        {
            // Not yet expired
            $normalizedLicense['support_active'] = 1;
        }

        return $normalizedLicense;
    }
}
