<?php

class MagicHomeApi 
{
    const API_PORT          = 5577;
    const DISCOVERY_PORT    = 48899;

    protected $socket;
    protected $device_ip;
    protected $device_type = 0;
    protected $latest_connection;
    protected $keep_alive;
    protected $debug    = false;
    protected $color    = [];
    protected $messages = [];
    protected $power    = false;
    protected $timeout  = 10; 

    protected $last_status;
    
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
        $this->send(0x81, 0x8A, 0x8B, 0x96);
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
        $msg[] = $this->checksum($msg);
        $this->send(...$msg);
    }

    public function turnOff()
    {   
        $this->log("Trying to turn off node.");
        $this->send(0x71, 0x24, 0x0F, 0xA4);
    }

    public function turnOn()
    {   
        $this->log("Trying to turn on node.");
        $this->send(0x71, 0x23, 0x0F, 0xA3);
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
            $status = socket_read($this->sock, 14);
            if(!$status){
                if($counter >= $tries){
                    break;
                }else{
                    $counter++;
                    sleep(1);
                }
            }
        }
        if ($status) {
            $array = unpack("C*", $status);
            $this->last_status = $array;
            $this->color = array_splice($array, 6, 3);
            $this->power = $array[2] == 35;
            return $array;
        }

        return $status;
    }

    public static function scan()
    {
    
        // sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
        // sock.bind(('', DISCOVERY_PORT))
        // sock.setsockopt(socket.SOL_SOCKET, socket.SO_BROADCAST, 1)
        
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $bind = socket_bind($sock, 'localhost', 48899);
        $opt = socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);

        $msg = "HF-A11ASSISTHREAD";
        

        
        # set the time at which we will quit the search
        $quit_time = time() + 15;

        $response_list = [];
        # outer loop for query send
        while (time() > $quit_time) {
            # send out a broadcast query
            $sock->sendto($msg, '<broadcast>', 48899);
            
            # inner loop waiting for responses
            while (true) {
                    echo time();
                    // data, addr = $sock.recvfrom(64);
                    $data = false;
                    $resp = socket_recvfrom($sock, $data, 12, 0);
                //except socket.timeout:
                //    data = None
                    if (time() > $quit_time) {
                        break;
                    }
    
                // if data is not None and data != msg:
                //     # tuples of IDs and IP addresses
                //     item = dict()
                //     item['ipaddr'] = data.split(',')[0]
                //     item['id'] = data.split(',')[1]
                //     item['model'] = data.split(',')[2]
                //     response_list.append(item)
            }

            echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $resp ); exit;
        }

        // self.found_bulbs = response_list
        // return response_list
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

