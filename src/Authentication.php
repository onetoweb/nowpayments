<?php

namespace NP;

/**
 * Authentication.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
class Authentication
{
    /**
     * @param string $content
     * @param string $receivedHmac
     * @param string $ipnSecret
     * 
     * @return bool
     */
    public static function authenticate(string $content, string $receivedHmac, string $ipnSecret): bool
    {
        if (!empty($content) && !empty($receivedHmac) && !empty($ipnSecret)) {
            
            $data = json_decode($content, true);
            ksort($data);
            $json = json_encode($data);
            
            if ($json !== false && !empty($json)) {
                
                $hmac = hash_hmac('sha512', $json, $ipnSecret);
                
                if ($receivedHmac == $hmac) {
                    return true;
                }
                
            }
        }
        
        return false;
    }
}