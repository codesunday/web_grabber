<?php
require_once ("Grabber.php");
require_once ("simple_html_dom.php");
class Extracter
{

  public function extractData($html, $comp) {
		$grabContent;
		$i=0;
		$keys=array("name","booking","age","gender", "race", "agency", "date", "bond", "charges", "picture");
		$name;
		$grabContent = new Grabber("http://www.jonesso.com/roster.php");
		//$comp = array();
		foreach($html->find('a[class=text2]') as $element) {
			  $i=0;
					// echo $element->href . '<br>';
			  $html = str_get_html($grabContent->grabUrl("http://www.jonesso.com/" . $element->href));
			  foreach($html->find('span[class=ptitles]') as $element) {
				//$i = 0;
				$txt = $element->innertext;
				$bool = strpos($txt,'(');
				//echo $bool;
				if ($bool === false) {
					$name[$i] = $element->innertext;
					$i++;
				}
					
			  }
			  foreach($html->find('td[class=text2]') as $element) {

						$len = $element->innertext;

						if($len != '&nbsp;'){
							$name[$i] = $element->innertext;
							$i++;
						}
			  }

			  foreach($html->find('span[class=text2]') as $element) {
				$bool = strpos($element->innertext,'href');
				if ($bool === false) {
					$skip = strpos($element->innertext,'M-F 8am - 5pm');
					if($skip === false) {
						$name[$i] = $element->innertext;
						$i++;
					}
				}
					
			  }

			  foreach($html->find('img[src*=inmates]') as $element) {
				//echo $element->src . '<br>';
					 $name[$i] = "http://www.jonesso.com/" . $element->src . '<br><br>';
						$i++;
			}

				$al = array_combine($keys,$name);
				array_push ($comp, $al);

		}
		return $comp;
	}
}
