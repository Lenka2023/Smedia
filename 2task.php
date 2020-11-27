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
		$phones = array( '971527139011', '171527139011' );

// get your list of country codes
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

foreach( $phones as $pn )
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

//print_r( $phonecountry );
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
$country = $api_result['country_code'];
//echo $country;

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
	/*if( $country == 'AF' ) $phonecontinent= 'Asia';
    if( $country == 'AX' ) $phonecontinent= 'Europe';
    if( $country == 'AL' ) $phonecontinent= 'Europe';
    if( $country == 'DZ' ) $phonecontinent= 'Africa';
    if( $country == 'AS' ) $phonecontinent= 'Oceania';
    if( $country == 'AD' ) $phonecontinent= 'Europe';
    if( $country == 'AO' ) $phonecontinent= 'Africa';
    if( $country == 'AI' ) $phonecontinent= 'North America';
    if( $country == 'AQ' ) $phonecontinent= 'Antarctica';
    if( $country == 'AG' ) $phonecontinent= 'North America';
    if( $country == 'AR' ) $phonecontinent= 'South America';
    if( $country == 'AM' ) $phonecontinent= 'Asia';
    if( $country == 'AW' ) $phonecontinent= 'North America';
    if( $country == 'AU' ) $phonecontinent= 'Oceania';
    if( $country == 'AT' ) $phonecontinent= 'Europe';
    if( $country == 'AZ' ) $phonecontinent= 'Asia';
    if( $country == 'BS' ) $phonecontinent= 'North America';
    if( $country == 'BH' ) $phonecontinent= 'Asia';
    if( $country == 'BD' ) $phonecontinent= 'Asia';
    if( $country == 'BB' ) $phonecontinent= 'North America';
    if( $country == 'BY' ) $phonecontinent= 'Europe';
    if( $country == 'BE' ) $phonecontinent= 'Europe';
    if( $country == 'BZ' ) $phonecontinent= 'North America';
    if( $country == 'BJ' ) $phonecontinent= 'Africa';
    if( $country == 'BM' ) $phonecontinent= 'North America';
    if( $country == 'BT' ) $phonecontinent= 'Asia';
    if( $country == 'BO' ) $phonecontinent= 'South America';
    if( $country == 'BA' ) $phonecontinent= 'Europe';
    if( $country == 'BW' ) $phonecontinent= 'Africa';
    if( $country == 'BV' ) $phonecontinent= 'Antarctica';
    if( $country == 'BR' ) $phonecontinent= 'South America';
    if( $country == 'IO' ) $phonecontinent= 'Asia';
    if( $country == 'VG' ) $phonecontinent= 'North America';
    if( $country == 'BN' ) $phonecontinent= 'Asia';
    if( $country == 'BG' ) $phonecontinent= 'Europe';
    if( $country == 'BF' ) $phonecontinent= 'Africa';
    if( $country == 'BI' ) $phonecontinent= 'Africa';
    if( $country == 'KH' ) $phonecontinent= 'Asia';
    if( $country == 'CM' ) $phonecontinent= 'Africa';
    if( $country == 'CA' ) $phonecontinent= 'North America';
    if( $country == 'CV' ) $phonecontinent= 'Africa';
    if( $country == 'KY' ) $phonecontinent= 'North America';
    if( $country == 'CF' ) $phonecontinent= 'Africa';
    if( $country == 'TD' ) $phonecontinent= 'Africa';
    if( $country == 'CL' ) $phonecontinent= 'South America';
    if( $country == 'CN' ) $phonecontinent= 'Asia';
    if( $country == 'CX' ) $phonecontinent= 'Asia';
    if( $country == 'CC' ) $phonecontinent= 'Asia';
    if( $country == 'CO' ) $phonecontinent= 'South America';
    if( $country == 'KM' ) $phonecontinent= 'Africa';
    if( $country == 'CD' ) $phonecontinent= 'Africa';
    if( $country == 'CG' ) $phonecontinent= 'Africa';
    if( $country == 'CK' ) $phonecontinent= 'Oceania';
    if( $country == 'CR' ) $phonecontinent= 'North America';
    if( $country == 'CI' ) $phonecontinent= 'Africa';
    if( $country == 'HR' ) $phonecontinent= 'Europe';
    if( $country == 'CU' ) $phonecontinent= 'North America';
    if( $country == 'CY' ) $phonecontinent= 'Asia';
    if( $country == 'CZ' ) $phonecontinent= 'Europe';
    if( $country == 'DK' ) $phonecontinent= 'Europe';
    if( $country == 'DJ' ) $phonecontinent= 'Africa';
    if( $country == 'DM' ) $phonecontinent= 'North America';
    if( $country == 'DO' ) $phonecontinent= 'North America';
    if( $country == 'EC' ) $phonecontinent= 'South America';
    if( $country == 'EG' ) $phonecontinent= 'Africa';
    if( $country == 'SV' ) $phonecontinent= 'North America';
    if( $country == 'GQ' ) $phonecontinent= 'Africa';
    if( $country == 'ER' ) $phonecontinent= 'Africa';
    if( $country == 'EE' ) $phonecontinent= 'Europe';
    if( $country == 'ET' ) $phonecontinent= 'Africa';
    if( $country == 'FO' ) $phonecontinent= 'Europe';
    if( $country == 'FK' ) $phonecontinent= 'South America';
    if( $country == 'FJ' ) $phonecontinent= 'Oceania';
    if( $country == 'FI' ) $phonecontinent= 'Europe';
    if( $country == 'FR' ) $phonecontinent= 'Europe';
    if( $country == 'GF' ) $phonecontinent= 'South America';
    if( $country == 'PF' ) $phonecontinent= 'Oceania';
    if( $country == 'TF' ) $phonecontinent= 'Antarctica';
    if( $country == 'GA' ) $phonecontinent= 'Africa';
    if( $country == 'GM' ) $phonecontinent= 'Africa';
    if( $country == 'GE' ) $phonecontinent= 'Asia';
    if( $country == 'DE' ) $phonecontinent= 'Europe';
    if( $country == 'GH' ) $phonecontinent= 'Africa';
    if( $country == 'GI' ) $phonecontinent= 'Europe';
    if( $country == 'GR' ) $phonecontinent= 'Europe';
    if( $country == 'GL' ) $phonecontinent= 'North America';
    if( $country == 'GD' ) $phonecontinent= 'North America';
    if( $country == 'GP' ) $phonecontinent= 'North America';
    if( $country == 'GU' ) $phonecontinent= 'Oceania';
    if( $country == 'GT' ) $phonecontinent= 'North America';
    if( $country == 'GG' ) $phonecontinent= 'Europe';
    if( $country == 'GN' ) $phonecontinent= 'Africa';
    if( $country == 'GW' ) $phonecontinent= 'Africa';
    if( $country == 'GY' ) $phonecontinent= 'South America';
    if( $country == 'HT' ) $phonecontinent= 'North America';
    if( $country == 'HM' ) $phonecontinent= 'Antarctica';
    if( $country == 'VA' ) $phonecontinent= 'Europe';
    if( $country == 'HN' ) $phonecontinent= 'North America';
    if( $country == 'HK' ) $phonecontinent= 'Asia';
    if( $country == 'HU' ) $phonecontinent= 'Europe';
    if( $country == 'IS' ) $phonecontinent= 'Europe';
    if( $country == 'IN' ) $phonecontinent= 'Asia';
    if( $country == 'ID' ) $phonecontinent= 'Asia';
    if( $country == 'IR' ) $phonecontinent= 'Asia';
    if( $country == 'IQ' ) $phonecontinent= 'Asia';
    if( $country == 'IE' ) $phonecontinent= 'Europe';
    if( $country == 'IM' ) $phonecontinent= 'Europe';
    if( $country == 'IL' ) $phonecontinent= 'Asia';
    if( $country == 'IT' ) $phonecontinent= 'Europe';
    if( $country == 'JM' ) $phonecontinent= 'North America';
    if( $country == 'JP' ) $phonecontinent= 'Asia';
    if( $country == 'JE' ) $phonecontinent= 'Europe';
    if( $country == 'JO' ) $phonecontinent= 'Asia';
    if( $country == 'KZ' ) $phonecontinent= 'Asia';
    if( $country == 'KE' ) $phonecontinent= 'Africa';
    if( $country == 'KI' ) $phonecontinent= 'Oceania';
    if( $country == 'KP' ) $phonecontinent= 'Asia';
    if( $country == 'KR' ) $phonecontinent= 'Asia';
    if( $country == 'KW' ) $phonecontinent= 'Asia';
    if( $country == 'KG' ) $phonecontinent= 'Asia';
    if( $country == 'LA' ) $phonecontinent= 'Asia';
    if( $country == 'LV' ) $phonecontinent= 'Europe';
    if( $country == 'LB' ) $phonecontinent= 'Asia';
    if( $country == 'LS' ) $phonecontinent= 'Africa';
    if( $country == 'LR' ) $phonecontinent= 'Africa';
    if( $country == 'LY' ) $phonecontinent= 'Africa';
    if( $country == 'LI' ) $phonecontinent= 'Europe';
    if( $country == 'LT' ) $phonecontinent= 'Europe';
    if( $country == 'LU' ) $phonecontinent= 'Europe';
    if( $country == 'MO' ) $phonecontinent= 'Asia';
    if( $country == 'MK' ) $phonecontinent= 'Europe';
    if( $country == 'MG' ) $phonecontinent= 'Africa';
    if( $country == 'MW' ) $phonecontinent= 'Africa';
    if( $country == 'MY' ) $phonecontinent= 'Asia';
    if( $country == 'MV' ) $phonecontinent= 'Asia';
    if( $country == 'ML' ) $phonecontinent= 'Africa';
    if( $country == 'MT' ) $phonecontinent= 'Europe';
    if( $country == 'MH' ) $phonecontinent= 'Oceania';
    if( $country == 'MQ' ) $phonecontinent= 'North America';
    if( $country == 'MR' ) $phonecontinent= 'Africa';
    if( $country == 'MU' ) $phonecontinent= 'Africa';
    if( $country == 'YT' ) $phonecontinent= 'Africa';
    if( $country == 'MX' ) $phonecontinent= 'North America';
    if( $country == 'FM' ) $phonecontinent= 'Oceania';
    if( $country == 'MD' ) $phonecontinent= 'Europe';
    if( $country == 'MC' ) $phonecontinent= 'Europe';
    if( $country == 'MN' ) $phonecontinent= 'Asia';
    if( $country == 'ME' ) $phonecontinent= 'Europe';
    if( $country == 'MS' ) $phonecontinent= 'North America';
    if( $country == 'MA' ) $phonecontinent= 'Africa';
    if( $country == 'MZ' ) $phonecontinent= 'Africa';
    if( $country == 'MM' ) $phonecontinent= 'Asia';
    if( $country == 'NA' ) $phonecontinent= 'Africa';
    if( $country == 'NR' ) $phonecontinent= 'Oceania';
    if( $country == 'NP' ) $phonecontinent= 'Asia';
    if( $country == 'AN' ) $phonecontinent= 'North America';
    if( $country == 'NL' ) $phonecontinent= 'Europe';
    if( $country == 'NC' ) $phonecontinent= 'Oceania';
    if( $country == 'NZ' ) $phonecontinent= 'Oceania';
    if( $country == 'NI' ) $phonecontinent= 'North America';
    if( $country == 'NE' ) $phonecontinent= 'Africa';
    if( $country == 'NG' ) $phonecontinent= 'Africa';
    if( $country == 'NU' ) $phonecontinent= 'Oceania';
    if( $country == 'NF' ) $phonecontinent= 'Oceania';
    if( $country == 'MP' ) $phonecontinent= 'Oceania';
    if( $country == 'NO' ) $phonecontinent= 'Europe';
    if( $country == 'OM' ) $phonecontinent= 'Asia';
    if( $country == 'PK' ) $phonecontinent= 'Asia';
    if( $country == 'PW' ) $phonecontinent= 'Oceania';
    if( $country == 'PS' ) $phonecontinent= 'Asia';
    if( $country == 'PA' ) $phonecontinent= 'North America';
    if( $country == 'PG' ) $phonecontinent= 'Oceania';
    if( $country == 'PY' ) $phonecontinent= 'South America';
    if( $country == 'PE' ) $phonecontinent= 'South America';
    if( $country == 'PH' ) $phonecontinent= 'Asia';
    if( $country == 'PN' ) $phonecontinent= 'Oceania';
    if( $country == 'PL' ) $phonecontinent= 'Europe';
    if( $country == 'PT' ) $phonecontinent= 'Europe';
    if( $country == 'PR' ) $phonecontinent= 'North America';
    if( $country == 'QA' ) $phonecontinent= 'Asia';
    if( $country == 'RE' ) $phonecontinent= 'Africa';
    if( $country == 'RO' ) $phonecontinent= 'Europe';
    if( $country == 'RU' ) $phonecontinent= 'Europe';
    if( $country == 'RW' ) $phonecontinent= 'Africa';
    if( $country == 'BL' ) $phonecontinent= 'North America';
    if( $country == 'SH' ) $phonecontinent= 'Africa';
    if( $country == 'KN' ) $phonecontinent= 'North America';
    if( $country == 'LC' ) $phonecontinent= 'North America';
    if( $country == 'MF' ) $phonecontinent= 'North America';
    if( $country == 'PM' ) $phonecontinent= 'North America';
    if( $country == 'VC' ) $phonecontinent= 'North America';
    if( $country == 'WS' ) $phonecontinent= 'Oceania';
    if( $country == 'SM' ) $phonecontinent= 'Europe';
    if( $country == 'ST' ) $phonecontinent= 'Africa';
    if( $country == 'SA' ) $phonecontinent= 'Asia';
    if( $country == 'SN' ) $phonecontinent= 'Africa';
    if( $country == 'RS' ) $phonecontinent= 'Europe';
    if( $country == 'SC' ) $phonecontinent= 'Africa';
    if( $country == 'SL' ) $phonecontinent= 'Africa';
    if( $country == 'SG' ) $phonecontinent= 'Asia';
    if( $country == 'SK' ) $phonecontinent= 'Europe';
    if( $country == 'SI' ) $phonecontinent= 'Europe';
    if( $country == 'SB' ) $phonecontinent= 'Oceania';
    if( $country == 'SO' ) $phonecontinent= 'Africa';
    if( $country == 'ZA' ) $phonecontinent= 'Africa';
    if( $country == 'GS' ) $phonecontinent= 'Antarctica';
    if( $country == 'ES' ) $phonecontinent= 'Europe';
    if( $country == 'LK' ) $phonecontinent= 'Asia';
    if( $country == 'SD' ) $phonecontinent= 'Africa';
    if( $country == 'SR' ) $phonecontinent= 'South America';
    if( $phonecuontry == 'SJ' ) $phonecontinent= 'Europe';
    if( $phonecuontry == 'SZ' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'SE' ) $phonecontinent= 'Europe';
    if( $phonecuontry == 'CH' ) $phonecontinent= 'Europe';
    if( $phonecuontry == 'SY' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TW' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TJ' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TZ' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'TH' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TL' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TG' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'TK' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'TO' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'TT' ) $phonecontinent= 'North America';
    if( $phonecuontry == 'TN' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'TR' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TM' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'TC' ) $phonecontinent= 'North America';
    if( $phonecuontry == 'TV' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'UG' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'UA' ) $phonecontinent= 'Europe';
    if( $phonecuontry == 'AE' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'GB' ) $phonecontinent= 'Europe';
    if( $phonecuontry == 'US' ) $phonecontinent= 'North America';
    if( $phonecuontry == 'UM' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'VI' ) $phonecontinent= 'North America';
    if( $phonecuontry == 'UY' ) $phonecontinent= 'South America';
    if( $phonecuontry == 'UZ' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'VU' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'VE' ) $phonecontinent= 'South America';
    if( $phonecuontry == 'VN' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'WF' ) $phonecontinent= 'Oceania';
    if( $phonecuontry == 'EH' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'YE' ) $phonecontinent= 'Asia';
    if( $phonecuontry == 'ZM' ) $phonecontinent= 'Africa';
    if( $phonecuontry == 'ZW' ) $phonecontinent= 'Africa';*/
	 /*if($continent==$Phonecontinent){
	$allCount=$allCount+1;
	$sameCountryCount=$sameCountryCount+1;   
}else if($continent!=$Phonecontinent){	
$allCount=$allCount;
	$sameCountryCount=$sameCountryCount+1; 				
		
}*/
echo $allCount;
	echo $sameCountryCount;
// получаем название региона
$region_name = $api_result['region_name'];
//echo $region_name;
// получаем название города
$city = $api_result['city'];
//echo $city;
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
$iparray = $ip->fetchAll(PDO::FETCH_ARRAY);
// print_r($iparray);
 $phone = $db->prepare("SELECT Phone FROM `smedia` WHERE id=6434");
  $phone->execute();
$phonearray = $phone->fetchAll(PDO::FETCH_ASSOC);
 print_r($phonearray);
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