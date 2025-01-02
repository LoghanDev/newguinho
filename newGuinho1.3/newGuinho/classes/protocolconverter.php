<?php
class ProtocolConverter {
    private static $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private static $protocolLength = 5;

    public static function idToProtocol($id) {
        $protocol = '';
        
        for ($i = 0; $i < self::$protocolLength; $i++) {
            $randomIndex = mt_rand(0, strlen(self::$characters) - 1);
            $protocol .= self::$characters[$randomIndex];
        }

        return $protocol;
    }

    public static function protocolToId($protocol) {
        $protocol = strtoupper($protocol);
        if (strlen($protocol) !== self::$protocolLength) {
            throw new Exception('Invalid protocol length');
        }

        $id = 0;
        for ($i = 0; $i < self::$protocolLength; $i++) {
            $char = $protocol[$i];
            $position = strpos(self::$characters, $char);
            if ($position === false) {
                throw new Exception('Invalid character in protocol');
            }

            $id = $id * strlen(self::$characters) + $position;
        }

        return $id;
    }
}
?>