<?php

set_time_limit(10000);
error_reporting(E_ALL);
date_default_timezone_set("Europe/Prague");
header('Content-Type: text/html; charset=utf-8');
//echo ini_get('max_execution_time');


include_once(__DIR__."/include/import_export/libs/vendor/autoload.php");
include_once(__DIR__.'/include/import_export/libs/simple_html_dom.php');
include_once(__DIR__.'/include/import_export/model/db.php');

function download($url, $fileName){
	/*
	$actualDate =  strtotime(date("Y-m-d"));

	$actualFileDate = 0;
	if(is_file($fileName)){
		$actualFileDate = filemtime($fileName);	
	}
	
	if($actualFileDate<$actualDate){
		$data = file_get_contents($url);
		file_put_contents($fileName, $data);		
	} else {
		$data = file_get_contents($fileName);
	}
	*/
	$data = file_get_contents($url);
	return $data;
}

function getPageCount($data)
{
	$html = str_get_html($data);
	$html = $html->find(".pager", 0);
	$pocet = 1;
	
	foreach($html->find("a") as $a){
		if($a->plaintext>$pocet){
			$pocet = (int)$a->plaintext;
		}
	}

	return $pocet;	
}

function getItem($dibi, $id)
{
	return $dibi->select("i.id_sapho, i.productno id, p.cenadph_akcni, p.cenadph_akcni_do, p.produkty_id")
		->from("produkty p")->join("import_sapho i")->on("i.id_sapho = p.dodavatel_id AND p.dodavatel_name = 'sapho'")
		->where("i.productno = %s", $id)
		->fetch();
}

function updateItem($dibi, $item)
{
	$row = getItem($dibi, $item["id"]);

	if($row && $item["akcni_cena"] > 0){

		$dibi->update("produkty", [
			"cenadph_akcni" => $item["akcni_cena"], 
			"cenadph_akcni_do" => $item["date"],
		])
		->where("produkty_id = %i", (int)$row->produkty_id)
		->where("dodavatel_id = %i", (int)$row->id_sapho)
		//->where("trim(lower(id)) = %s", strtolower($item["id"]))
		//->where("zaklcena = %i", $item["zakladni_cena"])
		->where("dodavatel_name = %s", "sapho")
		->execute();	
	}
}

function getItems($data){
	$items = [];
	
	$html = str_get_html($data);
	$html = $html->find("#product-news-list", 0);
	foreach($html->find(".product-item") as $row){
		$item = [];
		$item["akcni_cena"] = filterPrice($row->find(".cena",0)->plaintext);	
		$item["zakladni_cena"] = filterPrice($row->find(".cena-dis", 0)->plaintext);
		$item["id"] = trim(str_replace("Kód: ","",$row->find(".obj-kod",0)->plaintext));
		$items[$item["id"]] = $item;
	}

	return $items;
}

function filterPrice($data){
	return (double)str_replace(",",".",str_replace(["&nbsp;"," ",",","Kč","/ks","m2","/10 cm"],"", $data));
}

/*
$fileName = __DIR__."/curl/sapho.xml";
$url = "https://eshop.sapho.cz/?download=gen&file=feed&u=p007947&h=f528f1eb";
$data = download($url, $fileName);
$xml = simplexml_load_string($data);

$dibi->begin();
$dibi->query("DELETE FROM import_sapho2");
$dibi->commit();

$dibi->begin();

$types = [
	1 => 1,
	2 => 0,
	3 => 0,
	4 => 2,
	5 => 1,
	6 => 1,
	7 => 1,
	8 => 0,
	9 => 1,
	10 => 0,
	11 => 0,
	12 => 3,
	13 => 0,
	20 => 0,
	30 => 0,
	31 => 0,
	32 => 0,
	33 => 0,
	40 => 0,
	50 => 0,
	51 => 0,
	99 => 1,
];

foreach($xml->SHOPITEM as $SHOPITEM){
  try {
  	$type = (int)$SHOPITEM->TYPE_PRICES;



    $insert = [
      "id_sapho" => (int)$SHOPITEM->ID_SAPHO,
      "productno" => (string)$SHOPITEM->PRODUCTNO,
      "product" => (string)$SHOPITEM->PRODUCT,
      "manufacturer" =>  (string)$SHOPITEM->MANUFACTURER,
      "serie" =>  (string)$SHOPITEM->SERIE,
      "price" =>  (double)$SHOPITEM->RETAIL_PRICE,
      "price_vat" =>  (double)$SHOPITEM->RETAIL_PRICE_VAT,      
      "retail_price" =>  (double)$SHOPITEM->RETAIL_PRICE,
      "retail_price_vat" =>  (double)$SHOPITEM->RETAIL_PRICE_VAT,
      "vat" =>  (double)$SHOPITEM->VAT,
      "currency" => (string)$SHOPITEM->CURRENCY,
      "type_prices" => (isset($types[$type])?$types[$type]:0),
      "description_short" => (string)$SHOPITEM->DESCRIPTION_SHORT,
      "sale" => (int)$SHOPITEM->SALE,
      "categorytext" => (string)$SHOPITEM->CATEGORYTEXT,
      "in_stock" => (int)$SHOPITEM->IN_STOCK,
      "delivery_date" => (string)$SHOPITEM->DELIVERY_DATE,
      "unit" => (string)$SHOPITEM->UNIT,
      "warranty" => (int)$SHOPITEM->WARRANTY,
      "weight_kg" => (double)$SHOPITEM->WEIGHT_KG,
      "ean" => (string)$SHOPITEM->EAN,
      "url" => (string)$SHOPITEM->URL,
      "imgurl" => (string)$SHOPITEM->IMGURL,
      "multiple" => (double)$SHOPITEM->MULTIPLE,
   ];
   $dibi->insert("import_sapho2", $insert)->execute();    
 } catch(Dibi\DriverException $e){

  echo '<pre>';
  print_r($insert);
  print_r($e);
  die;

  }

}
$dibi->commit();
*/
/*
$dibi->query("
UPDATE produkty SET cenadph = c.retail_price_vat, cena = c.retail_price_vat/121*100, zaklcena = c.retail_price_vat FROM (
SELECT p.id, p.produkty_id, i.retail_price_vat
FROM import_sapho i join produkty p on p.dodavatel_id = i.id_sapho and p.dodavatel_name = 'sapho'
where p.zaklcena != i.retail_price_vat
and i.type_prices = 0
) c where c.produkty_id = produkty.produkty_id
");

$dibi->query("
UPDATE produkty SET cenadph = round(c.retail_price_vat*0.80), cena = round(c.retail_price_vat*0.80)/121*100, zaklcena = c.retail_price_vat FROM (
SELECT p.id, p.produkty_id, i.retail_price_vat
FROM import_sapho2 i join produkty p on p.dodavatel_id = i.id_sapho and p.dodavatel_name = 'sapho'
where i.type_prices = 1
) c where c.produkty_id = produkty.produkty_id
");

$dibi->query("
UPDATE produkty SET cenadph = round(c.retail_price_vat*0.87), cena = round(c.retail_price_vat*0.87)/121*100, zaklcena = c.retail_price_vat FROM (
SELECT p.id, p.produkty_id, i.retail_price_vat
FROM import_sapho2 i join produkty p on p.dodavatel_id = i.id_sapho and p.dodavatel_name = 'sapho'
where i.type_prices = 2
) c where c.produkty_id = produkty.produkty_id
");

$dibi->query("
UPDATE produkty SET cenadph = round(c.retail_price_vat*0.94), cena = round(c.retail_price_vat*0.94)/121*100, zaklcena = c.retail_price_vat FROM (
SELECT p.id, p.produkty_id, i.retail_price_vat
FROM import_sapho2 i join produkty p on p.dodavatel_id = i.id_sapho and p.dodavatel_name = 'sapho'
where i.type_prices = 3
) c where c.produkty_id = produkty.produkty_id
");

$dibi->query("
update produkty set dodani = c.new_dodani from (

select p.produkty_id, p.id, p.dodani, i.in_stock, i.delivery_date,

(
case
when i.in_stock = '1' then 14 
when i.delivery_date >= 56 then 46
when i.delivery_date >= 42 then 9
when i.delivery_date >= 35 then 31
when i.delivery_date >= 28 then 29
when i.delivery_date >= 21 then 41
when i.delivery_date >= 14 then 35
when i.delivery_date >= 10 then 39
when i.delivery_date >= 7 then 16
when i.delivery_date >= 5 then 37
when i.delivery_date >= 3 then 38
else 14
end
) new_dodani

from produkty p join import_sapho2 i on i.id_sapho = p.dodavatel_id where p.dodavatel_name = 'sapho'
and p.dodani not in (select did from dodani where skladem = 1)

order by i.delivery_date, p.produkty_id 

) c
where c.dodani != c.new_dodani
and produkty.produkty_id not in (

select produkty_id from produkty where ktg in (
select kid from kategorie where parrent = 3118) 
and dodani not in (select did from dodani where skladem = 1)
group by produkty_id

)
and produkty.produkty_id = c.produkty_id
");
*/

$fileName = __DIR__."/curl/sapho_index.html";
$url = "https://eshop.sapho.cz/cz/produkty-v-akci";
$data = download($url, $fileName);
$count = getPageCount($data);

$date = new DateTime(date('Y-m-d'));
$date->modify('+2 day');
$date = strtotime($date->format('Y-m-d'));

for($i=1;$i<=$count;$i++){
	$fileName = __DIR__."/curl/sapho_".$i.".html";

	$url = "https://eshop.sapho.cz/cz/produkty-v-akci?start=".(($i*30)-30);
	$data = download($url, $fileName);
	$items = getItems($data);
	foreach($items as $item){

		$item["date"] = $date;


		updateItem($dibi, $item);
	}

}


$date = date("Y-m-d");
$sql = "
UPDATE produkty SET cenadph_realna = c.cenadph_realna FROM (
SELECT produkty_id, 
case WHEN to_timestamp(cenadph_akcni_do) >= '".pg_escape_string($date)."' AND cenadph_akcni>0 
THEN cenadph_akcni
ELSE 0 END cenadph_realna
FROM produkty
WHERE to_timestamp(cenadph_akcni_do) >= '".pg_escape_string($date)."' AND
case WHEN to_timestamp(cenadph_akcni_do) >= '".pg_escape_string($date)."' AND cenadph_akcni>0 
THEN cenadph_akcni
ELSE cenadph END != cenadph_realna
AND stav = 1
) c where produkty.produkty_id = c.produkty_id
";

$dibi->query($sql);

$sql = "
update produkty set cenadph_realna = c.cenadph_realna from (
select produkty_id, cenadph_akcni_do cenadph_realna
from produkty
where stav = 1
and to_timestamp(cenadph_akcni_do) > '".date("Y-m-d")."'
and cenadph_akcni > 0
and cenadph_realna != cenadph_akcni
uNION 
select produkty_id, cenadph cenadph_realna
from produkty
where stav = 1
and to_timestamp(cenadph_akcni_do) <= '".date("Y-m-d")."'
and cenadph_realna != cenadph
) c
where c.produkty_id = produkty.produkty_id
";
$dibi->query($sql);

die;
/*
$sql = "
update produkty set stav = 0 where produkty_id in (
select produkty_id from produkty p left join  import_sapho2 i on i.id_sapho = p.dodavatel_id 
where p.stav = 1 and p.dodavatel_name = 'sapho' and i.id_sapho is null
and p.skladem_ks < 1
and p.dodani in (select did from dodani where skladem !=1)
)
";

$dibi->query($sql);
die;

$url = "http://b2b.novaservis.cz/xmlzbozi.xml";
$fileName = __DIR__."/curl/novaservis.xml";
$data = download($url, $fileName);
$xml = simplexml_load_string($data);


foreach($xml->SHOPITEM as $shopitem){
	$row = [
		'productname' => (string)$shopitem->PRODUCTNAME,
		'productnameext' => (string)$shopitem->PRODUCTNAMEEXT,
		'ean' => (double)$shopitem->EAN,
		'price' => (double)$shopitem->PRICE,
		'url' => (string)$shopitem->URL,
	];

	
	$dibi->insert("import_novaservis", $row)->execute();

}
*/
