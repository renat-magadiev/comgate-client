<?php

namespace Comgate\Enum;

class ResponseCode
{
    const CODE_OK = 0;
    const CODE_UNKNOWN = 1100;
    const CODE_NOT_SUPPORTED_LANG = 1102;
    const CODE_INVALID_METHOD = 1103;
    const CODE_UNABLE_TO_LOAD_PAYMENT = 1104;
    const CODE_DB_ERROR = 1200;
    const CODE_UNKNOWN_SHOP = 1301;
    const CODE_MISSING_LANG = 1303;
    const CODE_INVALID_CATEGORY = 1304;
    const CODE_MISSING_PRODUCT_DESC = 1305;
    const CODE_CHOOSE_CORRECT_METHOD = 1306;
    const CODE_NOT_SUPPORTED_METHOD = 1308;
    const CODE_INVALID_PRICE = 1309;
    const CODE_UNKNOWN_CURRENCY = 1310;
    const CODE_INVALID_BANK_ACCOUNT_IDENTIFIER = 1311;
    const CODE_PAYMENT_REPEAT_NOT_SUPPORTED = 1316;
    const CODE_INVALID_METHOD_REPEAT_PAYMENT = 1317;
    const CODE_UNABLE_TO_CREATE_PAYMENT = 1319;
    const CODE_DB_RESULT_ERROR = 1399;
    const CODE_INVALID_REQUEST = 1400;
    const CODE_FATAL = 1500;


    static $codes = [
        0    => 'OK',
        1100 => 'neznámá chyba',
        1102 => 'zadaný jazyk není podporován',
        1103 => 'nesprávně zadaná metoda',
        1104 => 'nelze načíst platbu',
        1200 => 'databázová chyba',
        1301 => 'neznámý eshop',
        1303 => 'propojení nebo jazyk chybí',
        1304 => 'neplatná kategorie',
        1305 => 'chybí popis produktu',
        1306 => 'vyberte správnou metodu',
        1308 => 'vybraný způsob platby není povolen',
        1309 => 'nesprávná částka',
        1310 => 'neznámá měna',
        1311 => 'neplatný identifikátor bankovního účtu Klienta',
        1316 => 'eshop nemá povolené opakované platby',
        1317 => 'neplatná metoda – nepodporuje opakované platby',
        1319 => 'nelze založit platbu, problém na straně banky',
        1399 => 'neočekávaný výsledek z databáze',
        1400 => 'chybný dotaz',
        1500 => 'neočekávaná chyba',
    ];
}