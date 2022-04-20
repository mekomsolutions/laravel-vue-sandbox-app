<?php

namespace App\Services;

class UuidV5
{

    function generateUuid($namespace, $name): string
    {
        if (preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-5][0-9a-f]{3}-[089ab][0-9a-f]{3}-[0-9a-f]{12}$/i", $namespace) === 0) {
            throw new \Exception("invalid namespace");
        }

        $hexNumber = str_replace("-", "", $namespace);

        $binary = "";
        for($i = 0; $i < strlen($hexNumber); $i += 2)
        {
            $binary .= chr(hexdec($hexNumber[$i] . $hexNumber[$i + 1]));
        }

        $hash = sha1($binary . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s',
            // 32 bits for the time_low
            substr($hash, 0, 8),
            // 16 bits for the time_mid
            substr($hash, 8, 4),
            // 16 bits for the time_hi,
            (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,
            // 8 bits and 16 bits for the clk_seq_hi_res,
            // 8 bits for the clk_seq_low,
            (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
            // 48 bits for the node
            substr($hash, 20, 12)
        );
    }
}
