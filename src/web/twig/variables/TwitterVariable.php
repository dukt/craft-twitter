<?php
/**
 * @link      https://dukt.net/craft/twitter/
 * @copyright Copyright (c) 2017, Dukt
 * @license   https://dukt.net/craft/twitter/docs/license
 */

namespace dukt\twitter\web\twig\variables;

/**
 * Twitter Variable
 *
 * @author Dukt <support@dukt.net>
 * @since  3.0
 */
class TwitterVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Performs a GET request on the Twitter API and returns the response.
     *
     * @param string $uri
     * @param array|null $query
     * @param array|null $headers
     * @param array $options
     * @param bool $enableCache
     * @param int $cacheExpire
     *
     * @return string|null
     */
	public function get($uri, array $query = null, array $headers = null, $options = array(), $enableCache = null, $cacheExpire = 0)
	{
	    try
        {
            return craft()->twitter_api->get($uri, $query, $headers, $options, $enableCache, $cacheExpire);
        }
        catch(\Exception $e)
        {
            // TwitterPlugin::log("Error requesting Twitter’s API using `".__METHOD__."`"."\r\n".$e->getMessage(), LogLevel::Error);
        }
	}

    /**
     * Returns a tweet by its ID. Add query parameters to the API request with `query`.
     *
     * @param int $tweetId
     * @param array $params
     *
     * @return array|null
     */
	public function getTweetById($tweetId, $query = array())
	{
        try
        {
            return craft()->twitter_api->getTweetById($tweetId, $query);
        }
        catch(\Exception $e)
        {
            // TwitterPlugin::log("Error requesting Twitter’s API using `".__METHOD__."`"."\r\n".$e->getMessage(), LogLevel::Error);
        }
	}

    /**
     * Returns a Twitter user by its ID. Add query parameters to the API request with `query`.
     *
     * @param int $twitterUserId
     * @param array $query
     *
     * @return array|null
     */
	public function getUserById($twitterUserId, $query = array())
	{
        try
        {
            return craft()->twitter_api->getUserById($twitterUserId, $query);
        }
        catch(\Exception $e)
        {
            // TwitterPlugin::log("Error requesting Twitter’s API using `".__METHOD__."`"."\r\n".$e->getMessage(), LogLevel::Error);
        }
	}

    /**
     * Returns a user image from a twitter user ID for given size. Default size is 48.
     *
     * @param int $twitterUserId
     * @param int $size
     *
     * @return string|null
     */
	public function getUserProfileImageResourceUrl($twitterUserId, $size = 48)
	{
        try
        {
            return TwitterHelper::getUserProfileImageResourceUrl($twitterUserId, $size);
        }
        catch(\Exception $e)
        {
            // TwitterPlugin::log("Error requesting Twitter’s API using `".__METHOD__."`"."\r\n".$e->getMessage(), LogLevel::Error);
        }
	}

    /**
     * Returns a user image from a twitter user ID for given size. Default size is 48.
     *
     * @param int $twitterUserId
     * @param int $size
     *
     * @deprecated Deprecated in 2.0. Use craft.twitter.getUserProfileImageResourceUrl() instead.
     *
     * @return string|null
     */
	public function getUserImageUrl($twitterUserId, $size = 48)
	{
	    return $this->getUserProfileImageResourceUrl($twitterUserId, $size);
	}
}