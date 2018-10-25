<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 23.10.2018
 * Time: 18:59
 */

namespace Core;


class Environment {

    private static $instance = null;

    private $env = [];

    /**
     * Environment constructor.
     * @throws Exceptions\EnvIsEmptyException
     * @throws Exceptions\EnvParseException
     */
    public function __construct() {
        $fileContent = file_get_contents(__DIR__ . '/../.env');
        $rawLines = $this->MakeLines($fileContent);
        if (empty($rawLines)) {
            throw new Exceptions\EnvIsEmptyException();
        }
        $this->ParseContent($rawLines);
    }

    private function MakeLines($content) : array {
        $normalizedContent = str_replace(array("\r\n", "\n\r", "\r"), "\n", $content);
        $exploded = explode("\n", $normalizedContent);
        $emptyLinesFiltered = array_filter($exploded, '\strlen');
        return $emptyLinesFiltered;
    }

    /**
     * @param array $rawLines
     * @throws Exceptions\EnvParseException
     */
    private function ParseContent(array $rawLines) : void {
        $linePos = 0;
        foreach ($rawLines as $rawLine) {
            $linePos++;
            //note that commented lines is not supported
            $rawLine = trim($rawLine);
            if (!$rawLine) {
                continue;
            }
            [$key, $value] = $this->ParseKeyValue($rawLine, $linePos);
            $this->env[$key] = $value;
        }
    }

    /**
     * Parsing single line
     * @param $rawLine
     * @param $linePos - position in .env file
     * @return array
     * @throws Exceptions\EnvParseException
     */
    private function ParseKeyValue($rawLine, $linePos) : array {
        $key_value = explode('=', $rawLine, 2);
        if (\count($key_value) !== 2) {
            throw new Exceptions\EnvParseException( "You must have a key = value at line $linePos. Instead found $rawLine" );
        }
        return $key_value;
    }

    /**
     * Get a value from .env file
     * @param $key
     * @param $default
     * @param $isVital - throw an error id key is missing
     * @throws Exceptions\EnvIsEmptyException
     * @throws Exceptions\EnvParseException
     * @throws \Exception
     * @return mixed
     */
    public static function Get($key, $default = '', $isVital = false) {
        if (!self::$instance) {
            self::$instance = new self();
        }
        if (array_key_exists($key, self::$instance->env)) {
            return self::$instance->env[$key];
        }
        if ($isVital) {
            //ToDo: unique Exception
            throw new \Exception("Parameter $key is vital but missing in .env file");
        }
        return $default;
    }
}