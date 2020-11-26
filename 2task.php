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

$access_key = 'd9f000dbc0237078dfb39bf8033d244c';
// инициализируем новый сеанс cURL
$ch[i] = curl_init('http://api.ipstack.com/'.$ip[].'?access_key='.$access_key.'');
// если нужно выбрать только страну, то можно так
//$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'&fields=country_code');
// устанавливаем параметр для указанного сеанса cURL
curl_setopt($ch[i], CURLOPT_RETURNTRANSFER, true);
// выполняем запрос cURL и сохраняем данные в $json
$json[i] = curl_exec($ch[i]);
// завершаем сеанс cURL
curl_close($ch[i]);
// декодируем JSON ответ
$api_result[i] = json_decode($json[i], true);

// получаем ISO-код страны
$county_code[i] = $api_result['country_code'];
echo $county_code;
// получаем название региона
$region_name = $api_result['region_name'];
// получаем название города
$city = $api_result['city'];
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