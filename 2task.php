<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"type="text/css"/>
       
       
	</head>
			<body>
			
<?php

set_time_limit(100);
/**
 * Класс для работы с csv-файлами 
 * @author дизайн студия ox2.ru  
 */
class CSV {
 
    private $_csv_file ="D:\Open_Server\OpenServer\domains\SMEDIA\cdrs.csv";
 
    /**
     * @param string $csv_file  - путь до csv-файла
     */
    public function __construct($csv_file) {
        if (file_exists($csv_file)) { //Если файл существует
            $this->_csv_file = $csv_file; //Записываем путь к файлу в переменную
        }
        else { //Если файл не найден то вызываем исключение
            throw new Exception("Файл  не найден"); 
        }
    }
 
    public function setCSV(Array $csv) {
        //Открываем csv для до-записи, 
        //если указать w, то  ифнормация которая была в csv будет затерта
        $handle = fopen($this->_csv_file, "a"); 
 
        foreach ($csv as $value) { //Проходим массив
            //Записываем, 3-ий параметр - разделитель поля
            fputcsv($handle, explode(";", $value), ";"); 
        }
        fclose($handle); //Закрываем
    }
 
    /**
     * Метод для чтения из csv-файла. Возвращает массив с данными из csv
     * @return array;
     */
    public function getCSV() {
	
		//$db=new mysqli('localhost', 'smedia', '', "smedia");
	/*if(mysqli_connect_errno()){
		printf("Error connect to DB:%S\n",mysqli_error($db));
		exit();
	}*/
	//$query1="SELECT* FROM `smedia`";
	//$RES=mysqli_query($db, $query1);
//$result=mysqli_fetch_array($RES);	
//var_dump($result[1]);
	//$query="INSERT INTO `smedia` (id, Date, duration, Phone, ip)
//VALUES (1, '2020-11-04', 3, 4, 5)";
//mysqli_query($db, $query);	
        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения
		$header = fgetcsv ($handle);
	$host = 'localhost';
    $db   = 'smedia';
    $user = 'smedia';
    $pass = '';
    $charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$db = new PDO($dsn, $user, $password, 
    array(PDO::MYSQL_ATTR_LOCAL_INFILE => true)
);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
/*$table="CREATE TABLE media(
  id int(11) NOT NULL,
  Date datetime NOT NULL,
  duration int(255) NOT NULL,
  Phone varchar(50) NOT NULL,
  ip varchar(50) NOT NULL);";
   $db->exec($table);*/
   $ip = $db->prepare("SELECT ip FROM `smedia`");
   $ip->execute();
$iparray = $ip->fetchAll(PDO::FETCH_ASSOC);
$ip0 = array();
 foreach($iparray as $key=>$value ){
	array_push($ip0,$value['ip']);
									}
//print_r($ip0);
//print_r($iparray[1]);
 $phone = $db->prepare("SELECT Phone FROM `smedia` ");
  $phone->execute();
$phonearray = $phone->fetchAll(PDO::FETCH_ASSOC);
$phone0 = array();
 foreach($phonearray as $key=>$value ){
	array_push($phone0,$value['Phone']);
									}
//print_r($phone0);
// print_r($phonearray);
	$sth = $db->prepare("set global local_infile = 1;
show variables like 'local_infile';
	LOAD DATA  LOCAL INFILE  'D:\Open_Server\OpenServer\domains\SMEDIA\cdrs.csv'  
INTO TABLE `smedia`  
FIELDS TERMINATED BY ','
ESCAPED BY '\\'
OPTIONALLY ENCLOSED BY '\"' 
LINES TERMINATED BY ',,,\r\n'
IGNORE 1 LINES 
(@id, @Date, @duration, @Phone, @ip)
SET Date = STR_TO_DATE(@Date, '%b-%d-%Y %h:%i:%s %p'),
    Phone = TRIM(BOTH '\'' FROM @Phone),
	 id = TRIM(BOTH '\'' FROM @id),
    duration = 1 * TRIM(TRAILING 'Secs' FROM @duration),
    ip = NULLIF(@ip, 'null');");
	$sth->execute();
$array = $sth->fetchAll(PDO::FETCH_ASSOC);
// var_dump($array);

$ccodes = array(
   '93' => 'AF',
'355' => 'AL',
'213' => 'DZ',
'376' => 'AD',
'244' => 'AO',
'672' => 'AQ',
'54' => 'AR',
'374' => 'AM',
'297' => 'AW',
'61' => 'AU',
'43' => 'AT',
'994' => 'AZ',
'973' => 'BH',
'880' => 'BD',
'375' => 'BY',
'32' => 'BE',
'501' => 'BZ',
'229' => 'BJ',
'975' => 'BT',
'591' => 'BO',
'387' => 'BA',
'267' => 'BW',
'55' => 'BR',
'673' => 'BN',
'359' => 'BG',
'226' => 'BF',
'95' => 'MM',
'257' => 'BI',
'855' => 'KH',
'237' => 'CM',
'1' => 'CA',
'238' => 'CV',
'236' => 'CF',
'235' => 'TD',
'56' => 'CL',
'86' => 'CN',
'61' => 'CX',
'61' => 'CC',
'57' => 'CO',
'269' => 'KM',
'242' => 'CG',
'243' => 'CD',
'682' => 'CK',
'506' => 'CR',
'385' => 'HR',
'53' => 'CU',
'357' => 'CY',
'420' => 'CZ',
'45' => 'DK',
'253' => 'DJ',
'670' => 'TL',
'593' => 'EC',
'20' => 'EG',
'503' => 'SV',
'240' => 'GQ',
'291' => 'ER',
'372' => 'EE',
'251' => 'ET',
'500' => 'FK',
'298' => 'FO',
'679' => 'FJ',
'358' => 'FI',
'33' => 'FR',
'689' => 'PF',
'241' => 'GA',
'220' => 'GM',
'995' => 'GE',
'49' => 'DE',
'233' => 'GH',
'350' => 'GI',
'30' => 'GR',
'299' => 'GL',
'502' => 'GT',
'224' => 'GN',
'245' => 'GW',
'592' => 'GY',
'509' => 'HT',
'504' => 'HN',
'852' => 'HK',
'36' => 'HU',
'91' => 'IN',
'62' => 'ID',
'98' => 'IR',
'964' => 'IQ',
'353' => 'IE',
'44' => 'IM',
'972' => 'IL',
'39' => 'IT',
'225' => 'CI',
'81' => 'JP',
'962' => 'JO',
'7' => 'KZ',
'254' => 'KE',
'686' => 'KI',
'965' => 'KW',
'996' => 'KG',
'856' => 'LA',
'371' => 'LV',
'961' => 'LB',
'266' => 'LS',
'231' => 'LR',
'218' => 'LY',
'423' => 'LI',
'370' => 'LT',
'352' => 'LU',
'853' => 'MO',
'389' => 'MK',
'261' => 'MG',
'265' => 'MW',
'60' => 'MY',
'960' => 'MV',
'223' => 'ML',
'356' => 'MT',
'692' => 'MH',
'222' => 'MR',
'230' => 'MU',
'262' => 'YT',
'52' => 'MX',
'691' => 'FM',
'373' => 'MD',
'377' => 'MC',
'976' => 'MN',
'382' => 'ME',
'212' => 'MA',
'258' => 'MZ',
'264' => 'NA',
'674' => 'NR',
'977' => 'NP',
'31' => 'NL',
'599' => 'AN',
'687' => 'NC',
'64' => 'NZ',
'505' => 'NI',
'227' => 'NE',
'234' => 'NG',
'683' => 'NU',
'850' => 'KP',
'47' => 'NO',
'968' => 'OM',
'92' => 'PK',
'680' => 'PW',
'507' => 'PA',
'675' => 'PG',
'595' => 'PY',
'51' => 'PE',
'63' => 'PH',
'870' => 'PN',
'48' => 'PL',
'351' => 'PT',
'1' => 'PR',
'974' => 'QA',
'40' => 'RO',
'7' => 'RU',
'250' => 'RW',
'590' => 'BL',
'685' => 'WS',
'378' => 'SM',
'239' => 'ST',
'966' => 'SA',
'221' => 'SN',
'381' => 'RS',
'248' => 'SC',
'232' => 'SL',
'65' => 'SG',
'421' => 'SK',
'386' => 'SI',
'677' => 'SB',
'252' => 'SO',
'27' => 'ZA',
'82' => 'KR',
'34' => 'ES',
'94' => 'LK',
'290' => 'SH',
'508' => 'PM',
'249' => 'SD',
'597' => 'SR',
'268' => 'SZ',
'46' => 'SE',
'41' => 'CH',
'963' => 'SY',
'886' => 'TW',
'992' => 'TJ',
'255' => 'TZ',
'66' => 'TH',
'228' => 'TG',
'690' => 'TK',
'676' => 'TO',
'216' => 'TN',
'90' => 'TR',
'993' => 'TM',
'688' => 'TV',
'971' => 'AE',
'256' => 'UG',
'44' => 'GB',
'380' => 'UA',
'598' => 'UY',
'1' => 'US',
'998' => 'UZ',
'678' => 'VU',
'39' => 'VA',
'58' => 'VE',
'84' => 'VN',
'681' => 'WF',
'967' => 'YE',
'260' => 'ZM',
'263' => 'ZW',
);

krsort( $ccodes );

foreach( $phone0 as $pn )
{
    foreach( $ccodes as $key=>$value )
    {
        if ( substr( $pn, 0, strlen( $key ) ) == $key )
        {
            // match
            $phonecountry[$pn] = $value;
            break;
        }
    }
}
$phonecountries= array();
 foreach($phonecountry as $key=>$value ){
	array_push($phonecountries,$value);
									}
//print_r($phonecountries);

/* foreach( $phonecountry as $key=>$value )
    {
var_dump( $value );
}*/
	
	
$country= array();
for($i=0;$i<100;$i++){

		
		
$access_key = 'd9f000dbc0237078dfb39bf8033d244c';
// инициализируем новый сеанс cURL
$ch = curl_init('http://api.ipstack.com/'.$ip0[$i].'?access_key='.$access_key.'');
// если нужно выбрать только страну, то можно так
//$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'&fields=country_code');
//echo $ch[$i];
// устанавливаем параметр для указанного сеанса cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// выполняем запрос cURL и сохраняем данные в $json
$json = curl_exec($ch);
// завершаем сеанс cURL
curl_close($ch);
// декодируем JSON ответ
$api_result = json_decode($json, true);

// получаем ISO-код страны
$countries = $api_result['country_code'];

array_push($country,$countries);

}
//print_r( $country);
$continents= array();
for($j=0;$j<100;$j++){
  if( $country[$j] == 'AF' ) $continent = 'Asia';
    if( $country[$j] == 'AX' ) $continent = 'Europe';
    if( $country[$j] == 'AL' ) $continent = 'Europe';
    if( $country[$j] == 'DZ' ) $continent = 'Africa';
    if( $country[$j] == 'AS' ) $continent = 'Oceania';
    if( $country[$j] == 'AD' ) $continent = 'Europe';
    if( $country[$j] == 'AO' ) $continent = 'Africa';
    if( $country[$j] == 'AI' ) $continent = 'North America';
    if( $country[$j] == 'AQ' ) $continent = 'Antarctica';
    if( $country[$j] == 'AG' ) $continent = 'North America';
    if( $country[$j] == 'AR' ) $continent = 'South America';
    if( $country[$j] == 'AM' ) $continent = 'Asia';
    if( $country[$j] == 'AW' ) $continent = 'North America';
    if( $country[$j] == 'AU' ) $continent = 'Oceania';
    if( $country[$j] == 'AT' ) $continent = 'Europe';
    if( $country[$j] == 'AZ' ) $continent = 'Asia';
    if( $country[$j] == 'BS' ) $continent = 'North America';
    if( $country[$j] == 'BH' ) $continent = 'Asia';
    if( $country[$j] == 'BD' ) $continent = 'Asia';
    if( $country[$j] == 'BB' ) $continent = 'North America';
    if( $country[$j] == 'BY' ) $continent = 'Europe';
    if( $country[$j] == 'BE' ) $continent = 'Europe';
    if( $country[$j] == 'BZ' ) $continent = 'North America';
    if( $country[$j] == 'BJ' ) $continent = 'Africa';
    if( $country[$j] == 'BM' ) $continent = 'North America';
    if( $country[$j] == 'BT' ) $continent = 'Asia';
    if( $country[$j] == 'BO' ) $continent = 'South America';
    if( $country[$j] == 'BA' ) $continent = 'Europe';
    if( $country[$j] == 'BW' ) $continent = 'Africa';
    if( $country[$j] == 'BV' ) $continent = 'Antarctica';
    if( $country[$j] == 'BR' ) $continent = 'South America';
    if( $country[$j] == 'IO' ) $continent = 'Asia';
    if( $country[$j] == 'VG' ) $continent = 'North America';
    if( $country[$j] == 'BN' ) $continent = 'Asia';
    if( $country[$j] == 'BG' ) $continent = 'Europe';
    if( $country[$j] == 'BF' ) $continent = 'Africa';
    if( $country[$j] == 'BI' ) $continent = 'Africa';
    if( $country[$j] == 'KH' ) $continent = 'Asia';
    if( $country[$j] == 'CM' ) $continent = 'Africa';
    if( $country[$j] == 'CA' ) $continent = 'North America';
    if( $country[$j] == 'CV' ) $continent = 'Africa';
    if( $country[$j] == 'KY' ) $continent = 'North America';
    if( $country[$j] == 'CF' ) $continent = 'Africa';
    if( $country[$j] == 'TD' ) $continent = 'Africa';
    if( $country[$j] == 'CL' ) $continent = 'South America';
    if( $country[$j] == 'CN' ) $continent = 'Asia';
    if( $country[$j] == 'CX' ) $continent = 'Asia';
    if( $country[$j] == 'CC' ) $continent = 'Asia';
    if( $country[$j] == 'CO' ) $continent = 'South America';
    if( $country[$j] == 'KM' ) $continent = 'Africa';
    if( $country[$j] == 'CD' ) $continent = 'Africa';
    if( $country[$j] == 'CG' ) $continent = 'Africa';
    if( $country[$j] == 'CK' ) $continent = 'Oceania';
    if( $country[$j] == 'CR' ) $continent = 'North America';
    if( $country[$j] == 'CI' ) $continent = 'Africa';
    if( $country[$j] == 'HR' ) $continent = 'Europe';
    if( $country[$j] == 'CU' ) $continent = 'North America';
    if( $country[$j] == 'CY' ) $continent = 'Asia';
    if( $country[$j] == 'CZ' ) $continent = 'Europe';
    if( $country[$j] == 'DK' ) $continent = 'Europe';
    if( $country[$j] == 'DJ' ) $continent = 'Africa';
    if( $country[$j] == 'DM' ) $continent = 'North America';
    if( $country[$j] == 'DO' ) $continent = 'North America';
    if( $country[$j] == 'EC' ) $continent = 'South America';
    if( $country[$j] == 'EG' ) $continent = 'Africa';
    if( $country[$j] == 'SV' ) $continent = 'North America';
    if( $country[$j] == 'GQ' ) $continent = 'Africa';
    if( $country[$j] == 'ER' ) $continent = 'Africa';
    if( $country[$j] == 'EE' ) $continent = 'Europe';
    if( $country[$j] == 'ET' ) $continent = 'Africa';
    if( $country[$j] == 'FO' ) $continent = 'Europe';
    if( $country[$j] == 'FK' ) $continent = 'South America';
    if( $country[$j] == 'FJ' ) $continent = 'Oceania';
    if( $country[$j] == 'FI' ) $continent = 'Europe';
    if( $country[$j] == 'FR' ) $continent = 'Europe';
    if( $country[$j] == 'GF' ) $continent = 'South America';
    if( $country[$j] == 'PF' ) $continent = 'Oceania';
    if( $country[$j] == 'TF' ) $continent = 'Antarctica';
    if( $country[$j] == 'GA' ) $continent = 'Africa';
    if( $country[$j] == 'GM' ) $continent = 'Africa';
    if( $country[$j] == 'GE' ) $continent = 'Asia';
    if( $country[$j] == 'DE' ) $continent = 'Europe';
    if( $country[$j] == 'GH' ) $continent = 'Africa';
    if( $country[$j] == 'GI' ) $continent = 'Europe';
    if( $country[$j] == 'GR' ) $continent = 'Europe';
    if( $country[$j] == 'GL' ) $continent = 'North America';
    if( $country[$j] == 'GD' ) $continent = 'North America';
    if( $country[$j] == 'GP' ) $continent = 'North America';
    if( $country[$j] == 'GU' ) $continent = 'Oceania';
    if( $country[$j] == 'GT' ) $continent = 'North America';
    if( $country[$j] == 'GG' ) $continent = 'Europe';
    if( $country[$j] == 'GN' ) $continent = 'Africa';
    if( $country[$j] == 'GW' ) $continent = 'Africa';
    if( $country[$j] == 'GY' ) $continent = 'South America';
    if( $country[$j] == 'HT' ) $continent = 'North America';
    if( $country[$j] == 'HM' ) $continent = 'Antarctica';
    if( $country[$j] == 'VA' ) $continent = 'Europe';
    if( $country[$j] == 'HN' ) $continent = 'North America';
    if( $country[$j] == 'HK' ) $continent = 'Asia';
    if( $country[$j] == 'HU' ) $continent = 'Europe';
    if( $country[$j] == 'IS' ) $continent = 'Europe';
    if( $country[$j] == 'IN' ) $continent = 'Asia';
    if( $country[$j] == 'ID' ) $continent = 'Asia';
    if( $country[$j] == 'IR' ) $continent = 'Asia';
    if( $country[$j] == 'IQ' ) $continent = 'Asia';
    if( $country[$j] == 'IE' ) $continent = 'Europe';
    if( $country[$j] == 'IM' ) $continent = 'Europe';
    if( $country[$j] == 'IL' ) $continent = 'Asia';
    if( $country[$j] == 'IT' ) $continent = 'Europe';
    if( $country[$j] == 'JM' ) $continent = 'North America';
    if( $country[$j] == 'JP' ) $continent = 'Asia';
    if( $country[$j] == 'JE' ) $continent = 'Europe';
    if( $country[$j] == 'JO' ) $continent = 'Asia';
    if( $country[$j] == 'KZ' ) $continent = 'Asia';
    if( $country[$j] == 'KE' ) $continent = 'Africa';
    if( $country[$j] == 'KI' ) $continent = 'Oceania';
    if( $country[$j] == 'KP' ) $continent = 'Asia';
    if( $country[$j] == 'KR' ) $continent = 'Asia';
    if( $country[$j] == 'KW' ) $continent = 'Asia';
    if( $country[$j] == 'KG' ) $continent = 'Asia';
    if( $country[$j] == 'LA' ) $continent = 'Asia';
    if( $country[$j] == 'LV' ) $continent = 'Europe';
    if( $country[$j] == 'LB' ) $continent = 'Asia';
    if( $country[$j] == 'LS' ) $continent = 'Africa';
    if( $country[$j] == 'LR' ) $continent = 'Africa';
    if( $country[$j] == 'LY' ) $continent = 'Africa';
    if( $country[$j] == 'LI' ) $continent = 'Europe';
    if( $country[$j] == 'LT' ) $continent = 'Europe';
    if( $country[$j] == 'LU' ) $continent = 'Europe';
    if( $country[$j] == 'MO' ) $continent = 'Asia';
    if( $country[$j] == 'MK' ) $continent = 'Europe';
    if( $country[$j] == 'MG' ) $continent = 'Africa';
    if( $country[$j] == 'MW' ) $continent = 'Africa';
    if( $country[$j] == 'MY' ) $continent = 'Asia';
    if( $country[$j] == 'MV' ) $continent = 'Asia';
    if( $country[$j] == 'ML' ) $continent = 'Africa';
    if( $country[$j] == 'MT' ) $continent = 'Europe';
    if( $country[$j] == 'MH' ) $continent = 'Oceania';
    if( $country[$j] == 'MQ' ) $continent = 'North America';
    if( $country[$j] == 'MR' ) $continent = 'Africa';
    if( $country[$j] == 'MU' ) $continent = 'Africa';
    if( $country[$j] == 'YT' ) $continent = 'Africa';
    if( $country[$j] == 'MX' ) $continent = 'North America';
    if( $country[$j] == 'FM' ) $continent = 'Oceania';
    if( $country[$j] == 'MD' ) $continent = 'Europe';
    if( $country[$j] == 'MC' ) $continent = 'Europe';
    if( $country[$j] == 'MN' ) $continent = 'Asia';
    if( $country[$j] == 'ME' ) $continent = 'Europe';
    if( $country[$j] == 'MS' ) $continent = 'North America';
    if( $country[$j] == 'MA' ) $continent = 'Africa';
    if( $country[$j] == 'MZ' ) $continent = 'Africa';
    if( $country[$j] == 'MM' ) $continent = 'Asia';
    if( $country[$j] == 'NA' ) $continent = 'Africa';
    if( $country[$j] == 'NR' ) $continent = 'Oceania';
    if( $country[$j] == 'NP' ) $continent = 'Asia';
    if( $country[$j] == 'AN' ) $continent = 'North America';
    if( $country[$j] == 'NL' ) $continent = 'Europe';
    if( $country[$j] == 'NC' ) $continent = 'Oceania';
    if( $country[$j] == 'NZ' ) $continent = 'Oceania';
    if( $country[$j] == 'NI' ) $continent = 'North America';
    if( $country[$j] == 'NE' ) $continent = 'Africa';
    if( $country[$j] == 'NG' ) $continent = 'Africa';
    if( $country[$j] == 'NU' ) $continent = 'Oceania';
    if( $country[$j] == 'NF' ) $continent = 'Oceania';
    if( $country[$j] == 'MP' ) $continent = 'Oceania';
    if( $country[$j] == 'NO' ) $continent = 'Europe';
    if( $country[$j] == 'OM' ) $continent = 'Asia';
    if( $country[$j] == 'PK' ) $continent = 'Asia';
    if( $country[$j] == 'PW' ) $continent = 'Oceania';
    if( $country[$j] == 'PS' ) $continent = 'Asia';
    if( $country[$j] == 'PA' ) $continent = 'North America';
    if( $country[$j] == 'PG' ) $continent = 'Oceania';
    if( $country[$j] == 'PY' ) $continent = 'South America';
    if( $country[$j] == 'PE' ) $continent = 'South America';
    if( $country[$j] == 'PH' ) $continent = 'Asia';
    if( $country[$j] == 'PN' ) $continent = 'Oceania';
    if( $country[$j] == 'PL' ) $continent = 'Europe';
    if( $country[$j] == 'PT' ) $continent = 'Europe';
    if( $country[$j] == 'PR' ) $continent = 'North America';
    if( $country[$j] == 'QA' ) $continent = 'Asia';
    if( $country[$j] == 'RE' ) $continent = 'Africa';
    if( $country[$j] == 'RO' ) $continent = 'Europe';
    if( $country[$j] == 'RU' ) $continent = 'Europe';
    if( $country[$j] == 'RW' ) $continent = 'Africa';
    if( $country[$j] == 'BL' ) $continent = 'North America';
    if( $country[$j] == 'SH' ) $continent = 'Africa';
    if( $country[$j] == 'KN' ) $continent = 'North America';
    if( $country[$j] == 'LC' ) $continent = 'North America';
    if( $country[$j] == 'MF' ) $continent = 'North America';
    if( $country[$j] == 'PM' ) $continent = 'North America';
    if( $country[$j] == 'VC' ) $continent = 'North America';
    if( $country[$j] == 'WS' ) $continent = 'Oceania';
    if( $country[$j] == 'SM' ) $continent = 'Europe';
    if( $country[$j] == 'ST' ) $continent = 'Africa';
    if( $country[$j] == 'SA' ) $continent = 'Asia';
    if( $country[$j] == 'SN' ) $continent = 'Africa';
    if( $country[$j] == 'RS' ) $continent = 'Europe';
    if( $country[$j] == 'SC' ) $continent = 'Africa';
    if( $country[$j] == 'SL' ) $continent = 'Africa';
    if( $country[$j] == 'SG' ) $continent = 'Asia';
    if( $country[$j] == 'SK' ) $continent = 'Europe';
    if( $country[$j] == 'SI' ) $continent = 'Europe';
    if( $country[$j] == 'SB' ) $continent = 'Oceania';
    if( $country[$j] == 'SO' ) $continent = 'Africa';
    if( $country[$j] == 'ZA' ) $continent = 'Africa';
    if( $country[$j] == 'GS' ) $continent = 'Antarctica';
    if( $country[$j] == 'ES' ) $continent = 'Europe';
    if( $country[$j] == 'LK' ) $continent = 'Asia';
    if( $country[$j] == 'SD' ) $continent = 'Africa';
    if( $country[$j] == 'SR' ) $continent = 'South America';
    if( $country[$j] == 'SJ' ) $continent = 'Europe';
    if( $country[$j] == 'SZ' ) $continent = 'Africa';
    if( $country[$j] == 'SE' ) $continent = 'Europe';
    if( $country[$j] == 'CH' ) $continent = 'Europe';
    if( $country[$j] == 'SY' ) $continent = 'Asia';
    if( $country[$j] == 'TW' ) $continent = 'Asia';
    if( $country[$j] == 'TJ' ) $continent = 'Asia';
    if( $country[$j] == 'TZ' ) $continent = 'Africa';
    if( $country[$j] == 'TH' ) $continent = 'Asia';
    if( $country[$j] == 'TL' ) $continent = 'Asia';
    if( $country[$j] == 'TG' ) $continent = 'Africa';
    if( $country[$j] == 'TK' ) $continent = 'Oceania';
    if( $country[$j] == 'TO' ) $continent = 'Oceania';
    if( $country[$j] == 'TT' ) $continent = 'North America';
    if( $country[$j] == 'TN' ) $continent = 'Africa';
    if( $country[$j] == 'TR' ) $continent = 'Asia';
    if( $country[$j] == 'TM' ) $continent = 'Asia';
    if( $country[$j] == 'TC' ) $continent = 'North America';
    if( $country[$j] == 'TV' ) $continent = 'Oceania';
    if( $country[$j] == 'UG' ) $continent = 'Africa';
    if( $country[$j] == 'UA' ) $continent = 'Europe';
    if( $country[$j] == 'AE' ) $continent = 'Asia';
    if( $country[$j] == 'GB' ) $continent = 'Europe';
    if( $country[$j] == 'US' ) $continent = 'North America';
    if( $country[$j] == 'UM' ) $continent = 'Oceania';
    if( $country[$j] == 'VI' ) $continent = 'North America';
    if( $country[$j] == 'UY' ) $continent = 'South America';
    if( $country[$j] == 'UZ' ) $continent = 'Asia';
    if( $country[$j] == 'VU' ) $continent = 'Oceania';
    if( $country[$j] == 'VE' ) $continent = 'South America';
    if( $country[$j] == 'VN' ) $continent = 'Asia';
    if( $country[$j] == 'WF' ) $continent = 'Oceania';
    if( $country[$j] == 'EH' ) $continent = 'Africa';
    if( $country[$j] == 'YE' ) $continent = 'Asia';
    if( $country[$j] == 'ZM' ) $continent = 'Africa';
    if( $country[$j] == 'ZW' ) $continent = 'Africa';
	array_push($continents,$continent);
	
}
//var_dump($continents);
$phonecontinents= array();

for($k=0;$k<100;$k++){
	if( $phonecountries[$k] == 'AF' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'AX' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'AL' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'DZ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'AS' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'AD' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'AO' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'AI' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'AQ' ) $phonecontinent= 'Antarctica';
    if( $phonecountries[$k] == 'AG' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'AR' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'AM' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'AW' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'AU' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'AT' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'AZ' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'BS' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'BH' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'BD' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'BB' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'BY' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'BE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'BZ' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'BJ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'BM' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'BT' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'BO' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'BA' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'BW' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'BV' ) $phonecontinent= 'Antarctica';
    if( $phonecountries[$k] == 'BR' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'IO' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'VG' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'BN' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'BG' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'BF' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'BI' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'KH' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'CM' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'CA' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'CV' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'KY' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'CF' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'TD' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'CL' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'CN' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'CX' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'CC' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'CO' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'KM' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'CD' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'CG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'CK' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'CR' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'CI' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'HR' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'CU' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'CY' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'CZ' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'DK' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'DJ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'DM' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'DO' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'EC' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'EG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SV' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'GQ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'ER' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'EE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'ET' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'FO' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'FK' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'FJ' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'FI' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'FR' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'GF' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'PF' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'TF' ) $phonecontinent= 'Antarctica';
    if( $phonecountries[$k] == 'GA' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GM' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GE' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'DE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'GH' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GI' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'GR' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'GL' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'GD' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'GP' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'GU' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'GT' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'GG' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'GN' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GW' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GY' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'HT' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'HM' ) $phonecontinent= 'Antarctica';
    if( $phonecountries[$k] == 'VA' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'HN' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'HK' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'HU' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'IS' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'IN' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'ID' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'IR' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'IQ' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'IE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'IM' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'IL' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'IT' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'JM' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'JP' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'JE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'JO' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'KZ' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'KE' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'KI' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'KP' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'KR' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'KW' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'KG' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'LA' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'LV' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'LB' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'LS' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'LR' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'LY' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'LI' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'LT' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'LU' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MO' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'MK' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MW' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MY' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'MV' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'ML' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MT' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MH' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'MQ' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'MR' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MU' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'YT' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MX' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'FM' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'MD' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MC' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MN' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'ME' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'MS' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'MA' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MZ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'MM' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'NA' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'NR' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'NP' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'AN' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'NL' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'NC' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'NZ' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'NI' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'NE' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'NG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'NU' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'NF' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'MP' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'NO' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'OM' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'PK' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'PW' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'PS' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'PA' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'PG' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'PY' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'PE' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'PH' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'PN' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'PL' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'PT' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'PR' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'QA' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'RE' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'RO' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'RU' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'RW' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'BL' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'SH' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'KN' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'LC' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'MF' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'PM' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'VC' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'WS' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'SM' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'ST' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SA' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'SN' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'RS' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'SC' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SL' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SG' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'SK' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'SI' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'SB' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'SO' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'ZA' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'GS' ) $phonecontinent= 'Antarctica';
    if( $phonecountries[$k] == 'ES' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'LK' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'SD' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SR' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'SJ' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'SZ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'SE' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'CH' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'SY' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TW' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TJ' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TZ' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'TH' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TL' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'TK' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'TO' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'TT' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'TN' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'TR' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TM' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'TC' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'TV' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'UG' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'UA' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'AE' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'GB' ) $phonecontinent= 'Europe';
    if( $phonecountries[$k] == 'US' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'UM' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'VI' ) $phonecontinent= 'North America';
    if( $phonecountries[$k] == 'UY' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'UZ' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'VU' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'VE' ) $phonecontinent= 'South America';
    if( $phonecountries[$k] == 'VN' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'WF' ) $phonecontinent= 'Oceania';
    if( $phonecountries[$k] == 'EH' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'YE' ) $phonecontinent= 'Asia';
    if( $phonecountries[$k] == 'ZM' ) $phonecontinent= 'Africa';
    if( $phonecountries[$k] == 'ZW' ) $phonecontinent= 'Africa';
	array_push($phonecontinents,$phonecontinent);
}
 $allCount=0;
	 $sameCountryCount=0;	
//var_dump($phonecontinents);
for($i=0;$i<100;$i++){
	 if($continents[$i]==$Phonecontinents[$i]){
	$allCount=$allCount+1;
	$sameCountryCount=$sameCountryCount+1; 
	 }	
else if($continents[$i]!=$Phonecontinents[$i]){	
$allCount=$allCount+1;
	$sameCountryCount=$sameCountryCount; 				
		
}
							}
echo $allCount;
echo $sameCountryCount;
	
		//var_dump($header);
        //$array_line_full = array(); //Массив будет хранить данные из csv
        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
		while (! feof ($handle)) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) { 
		
				
}

}
     
        fclose($handle); //Закрываем файл
        //return $array_line_full; //Возвращаем прочтенные данные
    }
 }

 
try {
    $csv = new CSV("cdrs.csv"); //Открываем наш csv
    /**
     * Чтение из CSV  (и вывод на экран в красивом виде)
     */
    echo "<h2>CSV до записи:</h2>";
    $get_csv = $csv->getCSV();
   
 
    /**
     * Запись новой информации в CSV
     */
    
}
catch (Exception $e) { //Если csv файл не существует, выводим сообщение
    echo "Ошибка: " . $e->getMessage();
}

?>
 
</body>		
</html>