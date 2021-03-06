<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09/09/2016
 * Time: 12:54
 */

include_once 'Model/Contrat.php';
include_once 'Model/Position.php';
include_once 'Model/Station.php';

include_once 'API/ApiRequester.php';
include_once 'API/JCDecauxUrlBuilder.php';

include 'DAO/Service.php';
include 'DAO/DAO.php';


$a = new Api\ApiRequester();

$s = new \DAO\Service();

$dao = new \DAO\DAO();

$contrats = $s->peuplerContrats($a->requeteTousContrats());
$dao->insertAllContrats($contrats);


$stations = $s->peuplerStations($a->requeteComplementStations($a->requeteToutesStations('Lyon')));
//$stations = $s->peuplerStation($a->requeteStation(2010, 'Lyon'));
$dao->insertAllStations($stations);
//var_dump($stations);

