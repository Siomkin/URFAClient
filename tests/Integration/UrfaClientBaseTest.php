<?php

namespace Tests;

/**
 * Базовый класс для тестов UrfaClient
 *
 * @license https://github.com/k-shym/UrfaClient/blob/master/LICENSE.md
 * @author  Konstantin Shum <k.shym@ya.ru>
 */
abstract class UrfaClientBaseTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var string
     */
    private static $prefix;

    /**
     * @return string Уникальное слово для тестов
     */
    protected static function prefix()
    {
        if (self::$prefix === null) {
            self::$prefix = date('YmdHis');
        }

        return self::$prefix;
    }

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var \UrfaClient\Client\UrfaClientAbstract
     */
    protected $api;

    /**
     * Создаем соединение для тестов
     * @throws \UrfaClient\Exception\UrfaClientException
     */
    protected function setUp(): void
    {
        $this->api = new \UrfaClient\UrfaClient($this->config);
    }

    public function test_rpcf_liburfa_list()
    {
        $this->assertTrue((bool)count($this->api->rpcf_liburfa_list()));
    }

    public function test_not_exist()
    {
        $this->assertFalse($this->api->not_exist());
    }

    /**
     * Делаем финальные проверки и закрываем соединение
     */
    protected function tearDown(): void
    {
//        $this->assertTrue(is_array(UrfaClient::trace_log()));
//        $this->assertTrue(is_string(UrfaClient::last_error()));

        unset($this->api);
    }
}
