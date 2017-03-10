<?php

class WifiBulb
{
    const API_PORT = 5577;

    protected $socket;
    protected $device_ip;
    protected $device_type = 0;
    protected $latest_connection;
    protected $keep_alive;
    protected $debug = false;
    protected $color    = [];
    protected $messages = [];
    protected $power    = false;
    
    public function __construct($ip, $type = 0, $keep_alive = true)
    {
        $this->device_ip = $ip;
        $this->device_type = $type;
        $this->latest_connection = time();
        $this->keep_alive = $keep_alive;
        $this->sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        try {
            $this->log("Establishing connection with the device.");
            socket_connect($this->sock, $this->device_ip, self::API_PORT);

            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            
            if ($errorcode) {
                die("Couldn't create socket: [$errorcode] $errormsg");
            }

        } catch (Exception $e) {
            socket_close($this->sock);
            die("Couldn't create socket: *exception*");
        }
    }

    public function debug()
    {
        $this->debug = true;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function status()
    {
        $this->log('Get status from Controller.');
        socket_clear_error();
        $this->send(0x81, 0x8A, 0x8B);
        $status = $this->waitResponse();

        if ($status) {
            $array = unpack("C*", $status);
            $this->last_status = $array;
            $this->color = array_splice($array, 6, 3);
            $this->power = $array[2] == 35;
            return $this->last_status;
        }

        // pattern = rx[3]
        // ww_level = rx[9]
        // mode = self.__determineMode(ww_level, pattern)
        // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $status ); exit;
        
        return false;
    }

    public function updateColor($r = 0, $g = 0, $b = 0, $brightness = 50)
    {
        $this->log("Tring to update color: {$r}, {$g}, {$b}.");

        $this->color = [
            $this->checkNumberRange($r), 
            $this->checkNumberRange($g), 
            $this->checkNumberRange($b)
        ];

        $this->setBrightness($brightness);

        $msg = [
            0x31, 
            $this->color[0],
            $this->color[1],
            $this->color[2],
            0x00,
            0x00, 
            0x0f
        ];

        $this->send(...$msg);
    }

    public function setBrightness($brightness = 100)
    {
        #Check if the given number is in the allowed range.
        if ($brightness < 10) {
            $brightness = 10;
        }
        if ($brightness > 100) {
            $brightness = 100;
        } 
        
        $brightness = $brightness/100;
    
        foreach ($this->color as $i => $color) {
            $this->color[$i] = (int) $color * $brightness;
        }
       
    }

    public function isOn()
    {
        return $this->power;
    }

    public function toggle()
    {   
        $status = $this->status();
        if ($this->isOn()) {
            return $this->turnOff();
        }
        return $this->turnOn();
    }

    public function turnOff()
    {   
        $this->log("Trying to turn off node.");
        $this->send(0x71, 0x24, 0x0F);
    }

    public function turnOn()
    {   
        $this->log("Trying to turn on node.");
        $this->send(0x71, 0x23, 0x0F);
    }

    protected function send(...$bytes)
    {

        $bytes[] = $this->checksum($bytes);

        $packed = pack('C*', ...$bytes);
        $len = strlen($packed);


        $this->log("-- Sending: " . print_r($bytes, true));
        socket_send($this->sock, $packed, $len, MSG_DONTROUTE);

        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        if ($errorcode) {
            die("Couldn't create socket: [$errorcode] $errormsg");
        }

        if ($this->debug) {
            echo print_r($this->messages, true);
        }
    }

    function waitResponse($bytes = 14) 
    {
        $this->log('Trying to get response from Controller.');
        $response = $status = "";

        $tries = 3;
        $counter = 0;

        while ($status == $response) {
            $status = socket_read($this->sock, $bytes);
            if(!$status){
                if($counter >= $tries){
                    break;
                }else{
                    $counter++;
                    sleep(3);
                }
            }
        }
        return $status;
    }

    private function checksum(...$bytes)
    {
        # Calculate the checksum from an array of bytes.
        return array_sum(...$bytes) & 0xFF;
    }

    private function log($msg = '')
    {
        $this->messages[] = $msg;
    }
    
    private function checkNumberRange ($number)
    {
        #Check if the given number is in the allowed range.
        if ($number < 0) {
            return 0;
        }
        if ($number > 255) {
            return 255;
        } 
        return $number;        
    }

}

