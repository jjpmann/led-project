<?php

class MagicHomeApi 
{
    const API_PORT = 5577;

    protected $debug = true;

    private $device_ip;
    private $device_type = 0;
    private $latest_connection;
    private $keep_alive;

    protected $messages = [];

    private $socket;

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

    public function status()
    {
        $this->log('Get status from Controller.');
        $this->send(0x81, 0x8A, 0x8B, 0x96);
        $r = $this->waitResponse();
        echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $r ); exit;
        
    }

    public function updateColor($r = 0, $g = 0, $b = 0)
    {
        $this->log("Tring to update color: {$r}, {$g}, {$b}.");
        //$msg = [0x31, $r, $g, $b];
        $msg = [
            0x31, 
            $this->checkNumberRange($r), 
            $this->checkNumberRange($g), 
            $this->checkNumberRange($b),
            0x00,
            0x00, 
            0x0f
        ];
        $msg[] = $this->checksum($msg);
        $this->send(...$msg);
    }

    public function turnOff()
    {   
        $this->log("Trying to turn off node.");
        $this->send(0x71, 0x24, 0x0F, 0xA4);
        //if self.device_type < 4 else self.send_bytes(0xCC, 0x24, 0x33)
    
    }

    public function turnOn()
    {   
        $this->log("Trying to turn on node.");
        $this->send(0x71, 0x23, 0x0F, 0xA3);
        //if self.device_type < 4 else self.send_bytes(0xCC, 0x24, 0x33)
    
    }

    protected function send(...$bytes)
    {

        $packed = pack('C*', ...$bytes);
        $len = strlen($packed);

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

    function waitResponse($response = "") 
    {
        $this->log('Trying to get response from Controller.');
        $status = "";
        $tries = 3;
        $counter = 0;
        while ($status == $response) {
            $status = socket_read($this->sock, 2048);
            if(!$status){
                if($counter >= $tries){
                    break;
                }else{
                    $counter++;
                    sleep(3);
                }
            }
        }
        return $response;
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

