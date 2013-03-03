  <?php
require_once ("Grabber.php");
require_once ("simple_html_dom.php");
require_once ("Extracter.php");
class Index
{
  private $_grabContent;

	public function Process()
	{

		$grabContent = new Grabber("http://www.jonesso.com/roster.php");

		//echo $grabContent->grabUrl("http://www.jonesso.com/roster.php");
		$comp = array();
		for($pager = 15; $pager <= 150; $pager = $pager + 15) {
			$html = str_get_html($grabContent->grabUrl("http://www.jonesso.com/roster.php?grp=" . $pager));

			$extract = new Extracter();
			$comp = $extract->extractData($html, $comp);

		}

		print_r($comp);

	}


}
$grab = new Index();
$grab->Process();


?>
