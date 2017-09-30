<?php
require_once 'xml2json.php';
//require_once 'unirest-php/src/Unirest.php';
require_once 'requests/library/Requests.php';

Requests::register_autoloader();


$listaMedios = array(
	"clarin" => ['url' => "https://www.clarin.com/rss/lo-ultimo/", 'location' => 'Nacional' ],
	"pagina12" => ['url' => "https://www.pagina12.com.ar/diario/rss/principal.xml", 'location' => 'Nacional' ],
	"infobae" => ['url' => "http://www.infobae.com/feeds/rss/", 'location' => 'Nacional' ],
	"03442" => ['url' => "http://03442.com.ar/feed/", 'location' => 'Entre Ríos' ],
	"chajari_virtual" => ['url' => "http://chajarivirtual.com.ar/feed/", 'location' => 'Entre Ríos' ],
	// http://www.elonce.com/rss/policiales.xml
	// http://www.elentrerios.com/
	// http://www.eldiaonline.com/contacto/
	// http://www.unoentrerios.com.ar/secciones/ultimo-momento.html
);
$itemsToSave = array();
$limitOfItemsPerMedium = 5;
$totalFeedNews = 0;
foreach ($listaMedios as $medio => $medioDatos) {
	$response = Requests::get($medioDatos['url'], array('Accept' => 'text/xml'))->body;
	//escribir($medio.'.json',xml2json($response,true));
	//escribir($medio.'.xml',$response);
	//var_dump(xml2json($response,true));
	$response =simplexml_load_string($response);
	/*
	for ($i =0; count($response->channel) < $i; $i++)
	{
		if($i==0)
		var_dump($response->channel[$i]);
	};
	*/
	//var_dump($response->channel->item);
	//echo $response;
	$items = xmlObjToArr($response)['children']['channel'][0]['children']['item'];
	$c = 0;
	foreach ($items as $i)
	{
		if($c < $limitOfItemsPerMedium)
		{

			$date = getNode($i,'pubdate');
			$link =	getNode($i,'link');
			$title = getNode($i,'title');
			$description = strip_tags(getNode($i,'description'));
			$image = getNode($i,'enclosure');
			$image = is_null($image)?"./images/default.jpg":$image;
			//"http://lorempixel.com/900/300":$image;



			$c++;
			$totalFeedNews++;

			$date = substr($date, 5, 20);
			$d = substr($date, 0, 2);
			//$month = array("January","February","March","April","May","June","July","August","September","October","November","December");
			$month = array("Jan"=>'01',"Feb"=>'02',"Mar"=>'03',"Apr"=>'04',"May"=>'05',"Jun"=>'06',"Jul"=>'07',"Aug"=>'08',"Sep"=>'09',"Oct"=>'10',"Nov"=>'11',"Dec"=>'12');
			$m = substr($date, 3, 3);
			//$m = $month[$m];
			$y = substr($date, 7, 4);
			$t = substr($date, 12, 8);

			$itemsToSave[] = array(
				'medium' => $medio,
				'location' => $medioDatos['location'],
				'date' => $date,//$y.'-'.$m.'-'.$d.' '.$t,
				'title' => $title,
				'link' => $link,
				'description' => $description,
				'image' => $image
			);

			var_dump( $date ); echo "<br>";
			var_dump( $link ); echo "<br>";
			var_dump( $title ); echo "<br>";
			var_dump( $description ); echo "<br>";
			var_dump( $image );
			echo '<hr/>';

		}
	}
}
echo $totalFeedNews;
escribir('data.json',json_encode($itemsToSave));
?>