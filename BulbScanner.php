<?php 

class  BulbScanner {

    protected $bulbs = [];

    protected $ip = false;
    protected $broadcast = false;

    public function __construct($ip, $broadcast)
    {
        $this->ip = $ip;
        $this->broadcast = $broadcast;   
    }
    
    public function getBulbInfoByID($id)
    {
        //bulb_info = None
        foreach ($this->bulbs as $bulb) {
            if ($bulb['id'] == $id) {
                return $bulb;
            }
        }
        return false;
    }

    public function getBulbInfo()
    {
        return $this->bulbs; 
    }
    
    public function scan($timeout=10)
    {
        //echo "<pre>".__FILE__.'<br>'.__METHOD__.' : '.__LINE__."<br><br>"; var_dump( $_SERVER ); exit;
        
        //$ip = '192.168.1.100';

        $sock   = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $bind   = socket_bind($sock, $this->ip, 48899);
        $opt    = socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);

        $msg = "HF-A11ASSISTHREAD";
        $len = strlen($msg);
        
        # set the time at which we will quit the search
        $quit_time = time() + 5;
        $list = [];
        $resp = $error = $data = $from = false;
        $port = 0;

        while (true) {

            if (time() > $quit_time) {
                break;
            }

            # send out a broadcast query
            socket_sendto($sock, $msg, $len, 0, $this->broadcast, 48899);
            socket_recvfrom($sock, $data, 64, 0, $from, $port);

             if ($data && $data != $msg) {
                    # tuples of IDs and IP addresses
                $arr = explode(',', $data);
                
                $item = [
                    'ipaddr'    => $arr[0],
                    'id'        => $arr[1],
                    'model'     => $arr[2],
                ];
                $list[$item['ipaddr']] = $item;
             } 
        }

        return $list;

    }
}