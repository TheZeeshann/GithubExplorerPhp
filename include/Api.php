<?php
define('API_URL', 'https://api.github.com/');

class Api
{
    function searchUser($username)
    {
        return $this->getMethodApi('search/users?q='.$username);
    }

    function getUser($username)
    {
        return $this->getMethodApi('users/'.$username);
    }

    function getFollowers($username)
    {
        return $this->getMethodApi('users/'.$username.'/followers');
    }

    function getFollowings($username)
    {
        return $this->getMethodApi('users/'.$username.'/following');
    }

    function getRepository($username)
    {
        return $this->getMethodApi('users/'.$username.'/repos');
    }

    function getMethodApi($endPoint)
    {
        $url = API_URL.$endPoint;
        $header[]  = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $response = json_decode($response,true);
        return $response;
    }
}
