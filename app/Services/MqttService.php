<?php

namespace App\Services;

use App\Models\Sensor;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttService{

public function receberDados(){

$host = env('MQTT_HOST');
$port = env('MQTT_PORT');
$username = env('MQTT_USERNAME');
$password = env('MQTT_PASSWORD');
$topic = env('MQTT_TOPIC');


$mqtt = new MqttClient(

$host, 
$port,
'tif-Cliente'.uniqid()

);

$settings = (new ConnectionSettings)

    ->setUsername($username)
    ->setPassword($password)
    ->setUseTls(true);

$mqtt->connect($settings, true);
echo("Laravel conectado ao hiveMQ");

$mqtt->subscribe($topic, function($topic, $message) 
{

echo "mensagem recebida: \n";
echo $message . "\n";

$dados = json_decode($message, true);

Sensor::create([

'sensor' => $dados['sensor'],
'temperatura' => $dados['temperatura'],
'umidade' => $dados['umidade']

]);
  
echo("Dados salvos no banco de dados com sucesso!\n");

}, 0);  

echo("Aguardando mensagens...\n");

$mqtt->loop(true);

}



}