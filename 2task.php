<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"type="text/css"/>
       
       
	</head>
			<body>
			
<?php
/**
 * Класс для работы с csv-файлами 
 * @author дизайн студия ox2.ru  
 */
class CSV {
 
    private $_csv_file ="cdrs.csv";
 
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
	 $allCount=0;
	 $sameCountryCount=0;	
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
	$sth = $db->prepare("LOAD DATA  LOCAL INFILE  'cdrs.csv' 
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
    ip = NULLIF(@ip, 'null')");
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
	
	

for($i=0;$i<100;$i++){

		
		$ip='116.52.75.78'; 
$access_key = 'd9f000dbc0237078dfb39bf8033d244c';
// инициализируем новый сеанс cURL
$ch[$i] = curl_init('http://api.ipstack.com/'.$ip0[$i].'?access_key='.$access_key.'');
// если нужно выбрать только страну, то можно так
//$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'&fields=country_code');
//echo $ch;
// устанавливаем параметр для указанного сеанса cURL
curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, true);
// выполняем запрос cURL и сохраняем данные в $json
$json[$i] = curl_exec($ch[$i]);
// завершаем сеанс cURL
curl_close($ch[$i]);
// декодируем JSON ответ
$api_result[$i] = json_decode($json[$i], true);

// получаем ISO-код страны
$country[$i] = $api_result['country_code'];
echo $country[$i];
}
  /*if( $country == 'AF' ) $continent = 'Asia';
    if( $country == 'AX' ) $continent = 'Europe';
    if( $country == 'AL' ) $continent = 'Europe';
    if( $country == 'DZ' ) $continent = 'Africa';
    if( $country == 'AS' ) $continent = 'Oceania';
    if( $country == 'AD' ) $continent = 'Europe';
    if( $country == 'AO' ) $continent = 'Africa';
    if( $country == 'AI' ) $continent = 'North America';
    if( $country == 'AQ' ) $continent = 'Antarctica';
    if( $country == 'AG' ) $continent = 'North America';
    if( $country == 'AR' ) $continent = 'South America';
    if( $country == 'AM' ) $continent = 'Asia';
    if( $country == 'AW' ) $continent = 'North America';
    if( $country == 'AU' ) $continent = 'Oceania';
    if( $country == 'AT' ) $continent = 'Europe';
    if( $country == 'AZ' ) $continent = 'Asia';
    if( $country == 'BS' ) $continent = 'North America';
    if( $country == 'BH' ) $continent = 'Asia';
    if( $country == 'BD' ) $continent = 'Asia';
    if( $country == 'BB' ) $continent = 'North America';
    if( $country == 'BY' ) $continent = 'Europe';
    if( $country == 'BE' ) $continent = 'Europe';
    if( $country == 'BZ' ) $continent = 'North America';
    if( $country == 'BJ' ) $continent = 'Africa';
    if( $country == 'BM' ) $continent = 'North America';
    if( $country == 'BT' ) $continent = 'Asia';
    if( $country == 'BO' ) $continent = 'South America';
    if( $country == 'BA' ) $continent = 'Europe';
    if( $country == 'BW' ) $continent = 'Africa';
    if( $country == 'BV' ) $continent = 'Antarctica';
    if( $country == 'BR' ) $continent = 'South America';
    if( $country == 'IO' ) $continent = 'Asia';
    if( $country == 'VG' ) $continent = 'North America';
    if( $country == 'BN' ) $continent = 'Asia';
    if( $country == 'BG' ) $continent = 'Europe';
    if( $country == 'BF' ) $continent = 'Africa';
    if( $country == 'BI' ) $continent = 'Africa';
    if( $country == 'KH' ) $continent = 'Asia';
    if( $country == 'CM' ) $continent = 'Africa';
    if( $country == 'CA' ) $continent = 'North America';
    if( $country == 'CV' ) $continent = 'Africa';
    if( $country == 'KY' ) $continent = 'North America';
    if( $country == 'CF' ) $continent = 'Africa';
    if( $country == 'TD' ) $continent = 'Africa';
    if( $country == 'CL' ) $continent = 'South America';
    if( $country == 'CN' ) $continent = 'Asia';
    if( $country == 'CX' ) $continent = 'Asia';
    if( $country == 'CC' ) $continent = 'Asia';
    if( $country == 'CO' ) $continent = 'South America';
    if( $country == 'KM' ) $continent = 'Africa';
    if( $country == 'CD' ) $continent = 'Africa';
    if( $country == 'CG' ) $continent = 'Africa';
    if( $country == 'CK' ) $continent = 'Oceania';
    if( $country == 'CR' ) $continent = 'North America';
    if( $country == 'CI' ) $continent = 'Africa';
    if( $country == 'HR' ) $continent = 'Europe';
    if( $country == 'CU' ) $continent = 'North America';
    if( $country == 'CY' ) $continent = 'Asia';
    if( $country == 'CZ' ) $continent = 'Europe';
    if( $country == 'DK' ) $continent = 'Europe';
    if( $country == 'DJ' ) $continent = 'Africa';
    if( $country == 'DM' ) $continent = 'North America';
    if( $country == 'DO' ) $continent = 'North America';
    if( $country == 'EC' ) $continent = 'South America';
    if( $country == 'EG' ) $continent = 'Africa';
    if( $country == 'SV' ) $continent = 'North America';
    if( $country == 'GQ' ) $continent = 'Africa';
    if( $country == 'ER' ) $continent = 'Africa';
    if( $country == 'EE' ) $continent = 'Europe';
    if( $country == 'ET' ) $continent = 'Africa';
    if( $country == 'FO' ) $continent = 'Europe';
    if( $country == 'FK' ) $continent = 'South America';
    if( $country == 'FJ' ) $continent = 'Oceania';
    if( $country == 'FI' ) $continent = 'Europe';
    if( $country == 'FR' ) $continent = 'Europe';
    if( $country == 'GF' ) $continent = 'South America';
    if( $country == 'PF' ) $continent = 'Oceania';
    if( $country == 'TF' ) $continent = 'Antarctica';
    if( $country == 'GA' ) $continent = 'Africa';
    if( $country == 'GM' ) $continent = 'Africa';
    if( $country == 'GE' ) $continent = 'Asia';
    if( $country == 'DE' ) $continent = 'Europe';
    if( $country == 'GH' ) $continent = 'Africa';
    if( $country == 'GI' ) $continent = 'Europe';
    if( $country == 'GR' ) $continent = 'Europe';
    if( $country == 'GL' ) $continent = 'North America';
    if( $country == 'GD' ) $continent = 'North America';
    if( $country == 'GP' ) $continent = 'North America';
    if( $country == 'GU' ) $continent = 'Oceania';
    if( $country == 'GT' ) $continent = 'North America';
    if( $country == 'GG' ) $continent = 'Europe';
    if( $country == 'GN' ) $continent = 'Africa';
    if( $country == 'GW' ) $continent = 'Africa';
    if( $country == 'GY' ) $continent = 'South America';
    if( $country == 'HT' ) $continent = 'North America';
    if( $country == 'HM' ) $continent = 'Antarctica';
    if( $country == 'VA' ) $continent = 'Europe';
    if( $country == 'HN' ) $continent = 'North America';
    if( $country == 'HK' ) $continent = 'Asia';
    if( $country == 'HU' ) $continent = 'Europe';
    if( $country == 'IS' ) $continent = 'Europe';
    if( $country == 'IN' ) $continent = 'Asia';
    if( $country == 'ID' ) $continent = 'Asia';
    if( $country == 'IR' ) $continent = 'Asia';
    if( $country == 'IQ' ) $continent = 'Asia';
    if( $country == 'IE' ) $continent = 'Europe';
    if( $country == 'IM' ) $continent = 'Europe';
    if( $country == 'IL' ) $continent = 'Asia';
    if( $country == 'IT' ) $continent = 'Europe';
    if( $country == 'JM' ) $continent = 'North America';
    if( $country == 'JP' ) $continent = 'Asia';
    if( $country == 'JE' ) $continent = 'Europe';
    if( $country == 'JO' ) $continent = 'Asia';
    if( $country == 'KZ' ) $continent = 'Asia';
    if( $country == 'KE' ) $continent = 'Africa';
    if( $country == 'KI' ) $continent = 'Oceania';
    if( $country == 'KP' ) $continent = 'Asia';
    if( $country == 'KR' ) $continent = 'Asia';
    if( $country == 'KW' ) $continent = 'Asia';
    if( $country == 'KG' ) $continent = 'Asia';
    if( $country == 'LA' ) $continent = 'Asia';
    if( $country == 'LV' ) $continent = 'Europe';
    if( $country == 'LB' ) $continent = 'Asia';
    if( $country == 'LS' ) $continent = 'Africa';
    if( $country == 'LR' ) $continent = 'Africa';
    if( $country == 'LY' ) $continent = 'Africa';
    if( $country == 'LI' ) $continent = 'Europe';
    if( $country == 'LT' ) $continent = 'Europe';
    if( $country == 'LU' ) $continent = 'Europe';
    if( $country == 'MO' ) $continent = 'Asia';
    if( $country == 'MK' ) $continent = 'Europe';
    if( $country == 'MG' ) $continent = 'Africa';
    if( $country == 'MW' ) $continent = 'Africa';
    if( $country == 'MY' ) $continent = 'Asia';
    if( $country == 'MV' ) $continent = 'Asia';
    if( $country == 'ML' ) $continent = 'Africa';
    if( $country == 'MT' ) $continent = 'Europe';
    if( $country == 'MH' ) $continent = 'Oceania';
    if( $country == 'MQ' ) $continent = 'North America';
    if( $country == 'MR' ) $continent = 'Africa';
    if( $country == 'MU' ) $continent = 'Africa';
    if( $country == 'YT' ) $continent = 'Africa';
    if( $country == 'MX' ) $continent = 'North America';
    if( $country == 'FM' ) $continent = 'Oceania';
    if( $country == 'MD' ) $continent = 'Europe';
    if( $country == 'MC' ) $continent = 'Europe';
    if( $country == 'MN' ) $continent = 'Asia';
    if( $country == 'ME' ) $continent = 'Europe';
    if( $country == 'MS' ) $continent = 'North America';
    if( $country == 'MA' ) $continent = 'Africa';
    if( $country == 'MZ' ) $continent = 'Africa';
    if( $country == 'MM' ) $continent = 'Asia';
    if( $country == 'NA' ) $continent = 'Africa';
    if( $country == 'NR' ) $continent = 'Oceania';
    if( $country == 'NP' ) $continent = 'Asia';
    if( $country == 'AN' ) $continent = 'North America';
    if( $country == 'NL' ) $continent = 'Europe';
    if( $country == 'NC' ) $continent = 'Oceania';
    if( $country == 'NZ' ) $continent = 'Oceania';
    if( $country == 'NI' ) $continent = 'North America';
    if( $country == 'NE' ) $continent = 'Africa';
    if( $country == 'NG' ) $continent = 'Africa';
    if( $country == 'NU' ) $continent = 'Oceania';
    if( $country == 'NF' ) $continent = 'Oceania';
    if( $country == 'MP' ) $continent = 'Oceania';
    if( $country == 'NO' ) $continent = 'Europe';
    if( $country == 'OM' ) $continent = 'Asia';
    if( $country == 'PK' ) $continent = 'Asia';
    if( $country == 'PW' ) $continent = 'Oceania';
    if( $country == 'PS' ) $continent = 'Asia';
    if( $country == 'PA' ) $continent = 'North America';
    if( $country == 'PG' ) $continent = 'Oceania';
    if( $country == 'PY' ) $continent = 'South America';
    if( $country == 'PE' ) $continent = 'South America';
    if( $country == 'PH' ) $continent = 'Asia';
    if( $country == 'PN' ) $continent = 'Oceania';
    if( $country == 'PL' ) $continent = 'Europe';
    if( $country == 'PT' ) $continent = 'Europe';
    if( $country == 'PR' ) $continent = 'North America';
    if( $country == 'QA' ) $continent = 'Asia';
    if( $country == 'RE' ) $continent = 'Africa';
    if( $country == 'RO' ) $continent = 'Europe';
    if( $country == 'RU' ) $continent = 'Europe';
    if( $country == 'RW' ) $continent = 'Africa';
    if( $country == 'BL' ) $continent = 'North America';
    if( $country == 'SH' ) $continent = 'Africa';
    if( $country == 'KN' ) $continent = 'North America';
    if( $country == 'LC' ) $continent = 'North America';
    if( $country == 'MF' ) $continent = 'North America';
    if( $country == 'PM' ) $continent = 'North America';
    if( $country == 'VC' ) $continent = 'North America';
    if( $country == 'WS' ) $continent = 'Oceania';
    if( $country == 'SM' ) $continent = 'Europe';
    if( $country == 'ST' ) $continent = 'Africa';
    if( $country == 'SA' ) $continent = 'Asia';
    if( $country == 'SN' ) $continent = 'Africa';
    if( $country == 'RS' ) $continent = 'Europe';
    if( $country == 'SC' ) $continent = 'Africa';
    if( $country == 'SL' ) $continent = 'Africa';
    if( $country == 'SG' ) $continent = 'Asia';
    if( $country == 'SK' ) $continent = 'Europe';
    if( $country == 'SI' ) $continent = 'Europe';
    if( $country == 'SB' ) $continent = 'Oceania';
    if( $country == 'SO' ) $continent = 'Africa';
    if( $country == 'ZA' ) $continent = 'Africa';
    if( $country == 'GS' ) $continent = 'Antarctica';
    if( $country == 'ES' ) $continent = 'Europe';
    if( $country == 'LK' ) $continent = 'Asia';
    if( $country == 'SD' ) $continent = 'Africa';
    if( $country == 'SR' ) $continent = 'South America';
    if( $country == 'SJ' ) $continent = 'Europe';
    if( $country == 'SZ' ) $continent = 'Africa';
    if( $country == 'SE' ) $continent = 'Europe';
    if( $country == 'CH' ) $continent = 'Europe';
    if( $country == 'SY' ) $continent = 'Asia';
    if( $country == 'TW' ) $continent = 'Asia';
    if( $country == 'TJ' ) $continent = 'Asia';
    if( $country == 'TZ' ) $continent = 'Africa';
    if( $country == 'TH' ) $continent = 'Asia';
    if( $country == 'TL' ) $continent = 'Asia';
    if( $country == 'TG' ) $continent = 'Africa';
    if( $country == 'TK' ) $continent = 'Oceania';
    if( $country == 'TO' ) $continent = 'Oceania';
    if( $country == 'TT' ) $continent = 'North America';
    if( $country == 'TN' ) $continent = 'Africa';
    if( $country == 'TR' ) $continent = 'Asia';
    if( $country == 'TM' ) $continent = 'Asia';
    if( $country == 'TC' ) $continent = 'North America';
    if( $country == 'TV' ) $continent = 'Oceania';
    if( $country == 'UG' ) $continent = 'Africa';
    if( $country == 'UA' ) $continent = 'Europe';
    if( $country == 'AE' ) $continent = 'Asia';
    if( $country == 'GB' ) $continent = 'Europe';
    if( $country == 'US' ) $continent = 'North America';
    if( $country == 'UM' ) $continent = 'Oceania';
    if( $country == 'VI' ) $continent = 'North America';
    if( $country == 'UY' ) $continent = 'South America';
    if( $country == 'UZ' ) $continent = 'Asia';
    if( $country == 'VU' ) $continent = 'Oceania';
    if( $country == 'VE' ) $continent = 'South America';
    if( $country == 'VN' ) $continent = 'Asia';
    if( $country == 'WF' ) $continent = 'Oceania';
    if( $country == 'EH' ) $continent = 'Africa';
    if( $country == 'YE' ) $continent = 'Asia';
    if( $country == 'ZM' ) $continent = 'Africa';
    if( $country == 'ZW' ) $continent = 'Africa';*/
	/*if( $phonecountries == 'AF' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'AX' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'AL' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'DZ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'AS' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'AD' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'AO' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'AI' ) $phonecontinent= 'North America';
    if( $phonecountries == 'AQ' ) $phonecontinent= 'Antarctica';
    if( $phonecountries == 'AG' ) $phonecontinent= 'North America';
    if( $phonecountries == 'AR' ) $phonecontinent= 'South America';
    if( $phonecountries == 'AM' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'AW' ) $phonecontinent= 'North America';
    if( $phonecountries == 'AU' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'AT' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'AZ' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'BS' ) $phonecontinent= 'North America';
    if( $phonecountries == 'BH' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'BD' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'BB' ) $phonecontinent= 'North America';
    if( $phonecountries == 'BY' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'BE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'BZ' ) $phonecontinent= 'North America';
    if( $phonecountries == 'BJ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'BM' ) $phonecontinent= 'North America';
    if( $phonecountries == 'BT' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'BO' ) $phonecontinent= 'South America';
    if( $phonecountries == 'BA' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'BW' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'BV' ) $phonecontinent= 'Antarctica';
    if( $phonecountries == 'BR' ) $phonecontinent= 'South America';
    if( $phonecountries == 'IO' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'VG' ) $phonecontinent= 'North America';
    if( $phonecountries == 'BN' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'BG' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'BF' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'BI' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'KH' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'CM' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'CA' ) $phonecontinent= 'North America';
    if( $phonecountries == 'CV' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'KY' ) $phonecontinent= 'North America';
    if( $phonecountries == 'CF' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'TD' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'CL' ) $phonecontinent= 'South America';
    if( $phonecountries == 'CN' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'CX' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'CC' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'CO' ) $phonecontinent= 'South America';
    if( $phonecountries == 'KM' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'CD' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'CG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'CK' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'CR' ) $phonecontinent= 'North America';
    if( $phonecountries == 'CI' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'HR' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'CU' ) $phonecontinent= 'North America';
    if( $phonecountries == 'CY' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'CZ' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'DK' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'DJ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'DM' ) $phonecontinent= 'North America';
    if( $phonecountries == 'DO' ) $phonecontinent= 'North America';
    if( $phonecountries == 'EC' ) $phonecontinent= 'South America';
    if( $phonecountries == 'EG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SV' ) $phonecontinent= 'North America';
    if( $phonecountries == 'GQ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'ER' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'EE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'ET' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'FO' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'FK' ) $phonecontinent= 'South America';
    if( $phonecountries == 'FJ' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'FI' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'FR' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'GF' ) $phonecontinent= 'South America';
    if( $phonecountries == 'PF' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'TF' ) $phonecontinent= 'Antarctica';
    if( $phonecountries == 'GA' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GM' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GE' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'DE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'GH' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GI' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'GR' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'GL' ) $phonecontinent= 'North America';
    if( $phonecountries == 'GD' ) $phonecontinent= 'North America';
    if( $phonecountries == 'GP' ) $phonecontinent= 'North America';
    if( $phonecountries == 'GU' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'GT' ) $phonecontinent= 'North America';
    if( $phonecountries == 'GG' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'GN' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GW' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GY' ) $phonecontinent= 'South America';
    if( $phonecountries == 'HT' ) $phonecontinent= 'North America';
    if( $phonecountries == 'HM' ) $phonecontinent= 'Antarctica';
    if( $phonecountries == 'VA' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'HN' ) $phonecontinent= 'North America';
    if( $phonecountries == 'HK' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'HU' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'IS' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'IN' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'ID' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'IR' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'IQ' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'IE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'IM' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'IL' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'IT' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'JM' ) $phonecontinent= 'North America';
    if( $phonecountries == 'JP' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'JE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'JO' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'KZ' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'KE' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'KI' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'KP' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'KR' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'KW' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'KG' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'LA' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'LV' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'LB' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'LS' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'LR' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'LY' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'LI' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'LT' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'LU' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MO' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'MK' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MW' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MY' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'MV' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'ML' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MT' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MH' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'MQ' ) $phonecontinent= 'North America';
    if( $phonecountries == 'MR' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MU' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'YT' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MX' ) $phonecontinent= 'North America';
    if( $phonecountries == 'FM' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'MD' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MC' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MN' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'ME' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'MS' ) $phonecontinent= 'North America';
    if( $phonecountries == 'MA' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MZ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'MM' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'NA' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'NR' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'NP' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'AN' ) $phonecontinent= 'North America';
    if( $phonecountries == 'NL' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'NC' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'NZ' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'NI' ) $phonecontinent= 'North America';
    if( $phonecountries == 'NE' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'NG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'NU' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'NF' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'MP' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'NO' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'OM' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'PK' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'PW' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'PS' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'PA' ) $phonecontinent= 'North America';
    if( $phonecountries == 'PG' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'PY' ) $phonecontinent= 'South America';
    if( $phonecountries == 'PE' ) $phonecontinent= 'South America';
    if( $phonecountries == 'PH' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'PN' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'PL' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'PT' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'PR' ) $phonecontinent= 'North America';
    if( $phonecountries == 'QA' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'RE' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'RO' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'RU' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'RW' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'BL' ) $phonecontinent= 'North America';
    if( $phonecountries == 'SH' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'KN' ) $phonecontinent= 'North America';
    if( $phonecountries == 'LC' ) $phonecontinent= 'North America';
    if( $phonecountries == 'MF' ) $phonecontinent= 'North America';
    if( $phonecountries == 'PM' ) $phonecontinent= 'North America';
    if( $phonecountries == 'VC' ) $phonecontinent= 'North America';
    if( $phonecountries == 'WS' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'SM' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'ST' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SA' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'SN' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'RS' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'SC' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SL' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SG' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'SK' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'SI' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'SB' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'SO' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'ZA' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'GS' ) $phonecontinent= 'Antarctica';
    if( $phonecountries == 'ES' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'LK' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'SD' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SR' ) $phonecontinent= 'South America';
    if( $phonecountries == 'SJ' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'SZ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'SE' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'CH' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'SY' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TW' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TJ' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TZ' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'TH' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TL' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'TK' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'TO' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'TT' ) $phonecontinent= 'North America';
    if( $phonecountries == 'TN' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'TR' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TM' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'TC' ) $phonecontinent= 'North America';
    if( $phonecountries == 'TV' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'UG' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'UA' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'AE' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'GB' ) $phonecontinent= 'Europe';
    if( $phonecountries == 'US' ) $phonecontinent= 'North America';
    if( $phonecountries == 'UM' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'VI' ) $phonecontinent= 'North America';
    if( $phonecountries == 'UY' ) $phonecontinent= 'South America';
    if( $phonecountries == 'UZ' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'VU' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'VE' ) $phonecontinent= 'South America';
    if( $phonecountries == 'VN' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'WF' ) $phonecontinent= 'Oceania';
    if( $phonecountries == 'EH' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'YE' ) $phonecontinent= 'Asia';
    if( $phonecountries == 'ZM' ) $phonecontinent= 'Africa';
    if( $phonecountries == 'ZW' ) $phonecontinent= 'Africa';*/
	 /*if($continent==$Phonecontinent){
	$allCount=$allCount+1;
	$sameCountryCount=$sameCountryCount+1;   
}else if($continent!=$Phonecontinent){	
$allCount=$allCount;
	$sameCountryCount=$sameCountryCount+1; 				
		
}*/
//echo $allCount;
	//echo $sameCountryCount;
	
		//var_dump($header);
        //$array_line_full = array(); //Массив будет хранить данные из csv
        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
		while (! feof ($handle)) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) { 
		//var_dump($data);
				
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