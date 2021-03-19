<!DOCTYPE html>
<html>
<head>

<!--Title-->
<title>Twin City</title>

<!--CSS Styling-->

<style>
h1 {
    color:lightskyblue;
    font-family: Verdana;
    font-size: 300%;
}
p 
{
    color:white;
    font-family: Verdana;
    font-size: 160%;
}
img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
}
</style>

<link rel="stylesheet" href="mystyle.css">

</head>

<!--Background-->
<body style="background-color:cornflowerblue;">

<!--Navigation Bar-->
<header>
    <h1>HOMEPAGE</h1>
    <nav>
        <ul class="nav">
            <li><a href="homepage.php">HOMEPAGE</a></li>
            <li><a href="liverpool.php">LIVERPOOL</a></li>
            <li><a href="rio.php">RIO</a></li>
        </ul>
    </nav>
    </header>

<br>
<br>
<br>
<br>
<br>
<br>

<p>Our 'Liverpool Section' will aim to display a range of images for the user. This will enable our users to gain a greater understanding into the appearance and the enviornment of this particualr city. It will be a good way for the user to compare this city to their twin, encouraging the concept of Twin Cities across the globe.</p>


</body>
<?php 
 
$url = 'https://api.flickr.com/services/rest/';
$data = array("method"=>"flickr.photos.search","api_key"=>"dc1f9eb346b25a1291c4970b6d0942c5","lat"=>"53.41009","per_page"=>"10","radius"=>"2","geo_context"=>"2","radius_units"=>"mi","lon"=>"-2.97843","format"=>"json","nojsoncallback"=>"1");
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$result = curl_exec($ch);
 
$result_data_json = json_decode($result,true);
 
$photoset = $result_data_json['photos'];
$photos = $photoset['photo'];
 
curl_close($ch);
 
foreach($photos as $pic){
    // https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}.jpg
    $pic_thumbnail_url = 'https://farm'.$pic['farm'].'.staticflickr.com/'.$pic['server'].'/'.$pic['id'].'_'.$pic['secret'].'_n.jpg';
   
 
    echo '<img  src='.$pic_thumbnail_url.'</img>';

}
?>
</html>