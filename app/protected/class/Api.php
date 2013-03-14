<?php

class Api {
	private $_apiKey;
	private $_apiSecret;
	private $_apiUrl;

	public function __construct($service) {
		$serviceDetails = Services::getServiceConfig($service);
		$this->_apiKey = $serviceDetails['id'];
		$this->_apiSecret = $serviceDetails['secret'];
		$this->_apiUrl = $serviceDetails['url'];
	}
	
	public function makeApiCall($method = 'GET', $extraUrl = '', $requestParams = array(), $curl = true, $useApiKey = true) {
        // create url
        $startUrl = $this->_apiUrl . $extraUrl;

        // convert params to string 
        foreach ($requestParams as $k => $v) {
            $pairs[] = $k .'='. $v;
        }
        if ($useApiKey) {
            $pairs[] = 'api_key' . '=' . $this->_apiKey;
        }
        $concatenatedParams = implode('&', $pairs);
        
        // form url
        $postData = null;
        $url = $startUrl ."&".$concatenatedParams;
    
        if ($curl) {
            $request = $this->_http($url, $postData);
            return $request;    
        }
        else {
            return $url;
        }
    }

    private function _http($url, $post_data = null) {   

        $start = microtime(true);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        if(isset($post_data))
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }

        $response = curl_exec($ch);
        $this->http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->last_api_call = $url;
        curl_close($ch);

        $debug = array(
            'url' => $url,
            'post_data' => $post_data,
            'response' => $response
        );
    //    Debug::info("Fetched url in " . round(microtime(true)-$start, 3) . "s ($url)", $debug, 'url', 'fetch');

        return $response;
    }

}