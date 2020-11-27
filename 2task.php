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
        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения
		$header = fgetcsv ($handle);	
		//var_dump($header);
        //$array_line_full = array(); //Массив будет хранить данные из csv
        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
		while (! feof ($handle)) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) { 
		//var_dump($data);
		$host = 'localhost';
    $db   = 'smedia';
    $user = 'smedia';
    $pass = '';
    $charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$db = new PDO($dsn, $user, $password, 
    array(PDO::MYSQL_ATTR_LOCAL_INFILE => true)
);
   $ip = $db->prepare("SELECT ip FROM `smedia` WHERE id=6434");
   $ip->execute();
$iparray = $ip->fetchAll(PDO::FETCH_ASSOC);
// var_dump($iparray);
 $phone = $db->prepare("SELECT Phone FROM `smedia` WHERE id=6434");
  $phone->execute();
$phonearray = $phone->fetchAll(PDO::FETCH_ASSOC);
 //var_dump($phonearray);
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


//for($i=o;$i<100;$i++){
	$allCount=0;
	$sameCountryCount=0;
	$ip='116.52.75.78'; 
$access_key = 'd9f000dbc0237078dfb39bf8033d244c';
// инициализируем новый сеанс cURL
$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
// если нужно выбрать только страну, то можно так
//$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'&fields=country_code');
// устанавливаем параметр для указанного сеанса cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// выполняем запрос cURL и сохраняем данные в $json
$json = curl_exec($ch);
// завершаем сеанс cURL
curl_close($ch);
// декодируем JSON ответ
$api_result = json_decode($json, true);

// получаем ISO-код страны
$country_code = $api_result['country_code'];
echo $country_code;

    $continent = '';
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
   // return $continent;
   /*if($continent==$Phonecontinent){
	$allCount=$allCount+1;
	$sameCountryCount=$sameCountryCount+1;   
}else if($continent!=$Phonecontinent){	
$allCount=$allCount;
	$sameCountryCount=$sameCountryCount+1; 				
		
}*/

//}


        
        fclose($handle); //Закрываем файл
        //return $array_line_full; //Возвращаем прочтенные данные
    }
 }
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