<?php

use Illuminate\Support\Facades\DB;


$products = DB::table("products")
->get();



echo "<?xml version='1.0'?>
<rss xmlns:g='http://base.google.com/ns/1.0' version='2.0'>
	<channel>
		<title>Boxeon - Monthly African Food Subscription</title>
		<link>http://www.boxeon.com</link>
		<description>Home in a box. Subscribe to monthly deliveries of your favorite foods from home to save time and money. Cancel anytime.</description>";
		
      foreach($products as $feed){ 

		    // HACK
			$name = explode('.', $feed->img);
			$img = $name[0] . '.jpeg';

		echo "<item>
			<g:id>$feed->id</g:id>
			<g:title>$feed->name</g:title>
			<g:description>$feed->description</g:description>
			<g:link>https://www.boxeon.com/shop/item?id=$feed->id</g:link>
			<g:image_link>https://boxeon.com/assets/images/products/medium/$img</g:image_link>
			<g:condition>new</g:condition>
			<g:availability>in stock</g:availability>
			<g:price>$feed->price.00 USD</g:price>
			<g:shipping>
				<g:country>US</g:country>
				<g:service>Flat Rate</g:service>
				<g:price>17.00 USD</g:price>
			</g:shipping>
			
			<g:gtin></g:gtin>
			<g:brand></g:brand>
			<g:mpn></g:mpn>
			

			<g:google_product_category>Food > $feed->category</g:google_product_category>
			<g:product_type>African</g:product_type>
		</item>";
      }
	
		
	echo '</channel></rss>';

?>