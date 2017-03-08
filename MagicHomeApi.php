<?php

class MagicHomeApi 
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
        $status = $this->send(0x81, 0x8A, 0x8B);
        // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $status ); exit;
        
        return $this->waitResponse();
    }

    public function updateColor($r = 0, $g = 0, $b = 0)
    {
        $this->log("Tring to update color: {$r}, {$g}, {$b}.");
        $msg = [
            0x31, 
            $this->checkNumberRange($r), 
            $this->checkNumberRange($g), 
            $this->checkNumberRange($b),
            0x00,
            0x00, 
            0x0f
        ];
        $this->send(...$msg);

        //return $this->waitResponse();

        // sleep(3);
        // return $this->status();
    }

    public function isOn()
    {
        // $this->status();
        return $this->power;
    }

    public function turnOff()
    {   
        $this->log("Trying to turn off node.");
        $this->send(0x71, 0x24, 0x0F);
        // sleep(.4);
        // return $this->status();
    }

    public function turnOn()
    {   
        $this->log("Trying to turn on node.");
        $this->send(0x71, 0x23, 0x0F);
        // sleep(.4);
        // return $this->status();
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

        // $status  = false;
        // $bytes = socket_recv($this->sock, $status, 14, MSG_WAITALL);

        // echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $bytes ); exit;
        
        // if ($status) {
        //     $array = unpack("C*", $status);
        //     $this->last_status = $array;
        //     $this->color = array_splice($array, 6, 3);
        //     $this->power = $array[2] == 35;
        //     return $array;
        // }
        
        // return false;
    }

    function waitResponse($response = "") 
    {
        $this->log('Trying to get response from Controller.');
        $status = "";
        $tries = 3;
        $counter = 0;
        while ($status == $response) {
            $status = socket_read($this->sock, 14);
            if(!$status){
                if($counter >= $tries){
                    break;
                }else{
                    $counter++;
                    sleep(3);
                }
            }
        }
        if ($status) {
            $array = unpack("C*", $status);
            $this->color = array_splice($array, 6, 3);
            return $array;
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

