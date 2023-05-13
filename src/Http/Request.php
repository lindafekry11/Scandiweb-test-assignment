<?php

namespace src\Http;

class Request
{
    // Returns the HTTP request method used to access the current page, 'GET' or 'POST' ?
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // Returns path component of the URL to determine the current page being accessed
    public static function path()
    {
        return parse_url($_SERVER['REQUEST_URI'])["path"] ?? '/'; // default value is '/'  if the path component is not present in the URL
    }
}
