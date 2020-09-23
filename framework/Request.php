<?php
namespace Framework;

class Request {

    public function __construct() {
        foreach($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    public function getBody(): array {
        $body = [];
        if($this->requestMethod === "POST") {
            foreach($_POST as $key => $value) {
                $body[$key]= filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    private function toCamelCase(string $string): string {
      $result = strtolower($string);
      preg_match_all('/_[a-z]/', $result, $matches);

      foreach($matches[0] as $match) {
          $c = str_replace('_', '', strtoupper($match));
          $result = str_replace($match, $c, $result);
      }

      return $result;
    }
}
