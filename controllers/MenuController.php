<?php
/**
 * MenuController.php short discription
 *
 * long discription
 *
 */
use eftec\bladeone\BladeOne;
require_once(dirname(__DIR__). '/library/Ext/Controller/Action.php');
/**
 * MenuControllerClass short discription
 *
 * long discription
 *
 */
class MenuController extends Ext_Controller_Action
{
	protected $_test = 'test';

	/**
	 *
	 **/
	public function listAction() {
		$get = (object) $_GET;
		$post = (object) $_POST;



//wp���O�C�����֘A���擾
$wp_user_info = wp_get_current_user();
//echo $user -> user_login; //���O�C��ID���擾
$user_login = $wp_user_info->user_login;

//DB�R�l�N�^�𐶐�
$host = 'localhost';
$username = 'root';
$password = 'aErQl0cbmYmO';
$dbname = 'stocks';

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
	error_log($mysqli->connect_error);
	exit;
}

$sql = "select * from s4042 limit 10;";

//SQL�������s����
$data_set = $mysqli->query($sql);
//�����₷���`�ɕς���
$result = [];
while($row = $data_set->fetch_assoc()){
	$rows[] = $row;
}
var_dump($rows);


		$get->action = 'search';
		switch($get->action) {
			case 'search':
			default:
//				$tb = new Customer;
//				$initForm = $tb->getInitForm();
//				$rows = $tb->getList($get, $un_convert = true);
				$formPage = 'menu-top';
//$this->vd($rows);
				echo $this->get_blade()->run("menu-top", compact('rows', 'formPage', 'initForm'));
				break;
		}
		return $this->_test;
	}

	/**
	 *
	 **/
	public function detailAction() {
		echo $this->get_blade()->run("customer-detail");
	}
}
?>
