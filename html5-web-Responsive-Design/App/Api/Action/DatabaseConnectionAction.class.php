<?php
namespace Api\Action;
class DatabaseConnectionAction extends BaseAction
{
    public static $dbHand;
    public $dbInfo;
    public $insertID;
    public $affectedRows;
    public $msg;

	function __construct()
	{
        parent::__construct();
        $this->conn();

	}
    public function connMysql($serverName, $userAccount, $userPassword){
        self :: $dbHand = @mysql_connect($serverName, $userAccount, $userPassword) or die("Error:Database Connect Failure.");
        if (FALSE == (self :: $dbHand instanceof self)) {
            self :: $dbHand = @mysql_connect($serverName, $userAccount, $userPassword);
        }
        return self :: $dbHand;
    }

	public function conn(){
        /*
         * 数据库的配置
         * */

        $databaseInfo['mysql'] = array('serverName' => '10.11.2.16',
            'UID' => 'root',
            'PWD' => '123123',
            'Database' => 'leego_womdee',
            'DBCode' => 'utf8');

        $dbInfo['serverName'] = $databaseInfo['mysql']['serverName'];
        $dbInfo['userAccount'] = $databaseInfo['mysql']['UID'];
        $dbInfo['userPassword'] = $databaseInfo['mysql']['PWD'];
        $dbInfo['databaseName'] = $databaseInfo['mysql']['Database']; 
        @$this->dbHand = $this->connMysql($dbInfo['serverName'], $dbInfo['userAccount'], $dbInfo['userPassword']);

        $msg = '';
        mysql_select_db($dbInfo['databaseName']);
        mysql_query("SET NAMES " . $databaseInfo['mysql']['DBCode'] . "");
        mysql_query('set character_set_client = ' . $databaseInfo['mysql']['DBCode'] . '');
        mysql_query('set character_set_connection = ' . $databaseInfo['mysql']['DBCode'] . '');
        mysql_query('set character_set_results = ' . $databaseInfo['mysql']['DBCode'] . '');
    }

    function query($sql) {
        $queryResult = @mysql_query($sql, $this->dbHand);
        $this->insertID = mysql_insert_id();
        $this->affectedRows = mysql_affected_rows();
        return $queryResult;
    }
    function getRecordSet($sql) {
        $recordSet = array();
        $rsArr = $this->query($sql);
        while ($rs = @mysql_fetch_array($rsArr)) {
            $recordSet[] = $rs;
        }
        return $recordSet;
    }
    function getRecordSetOnlyAssoc($sql) {
        $recordSet = array();
        $rsArr = $this->query($sql);
        while ($rs = @mysql_fetch_assoc($rsArr)) {
            $recordSet[] = $rs;
        }
        return $recordSet;
    }

    function getRecordOne($sql) {
        $rsArr = $this->query($sql);
        $rs = @mysql_fetch_array($rsArr);
        return $rs;
    }
    function getNumRows($sql) {
        $tempSql = explode('limit', $sql);
        $sql = $tempSql[0];
        $rsArr = $this->query($sql);
        return mysql_num_rows($rsArr);
    }
    function getRecordNum($field,$sql){
        $tmpSql=str_replace($field,"count(*) as num",$sql);
        $rsArr = $this->query($tmpSql);
        $rs = @mysql_fetch_array($rsArr);
        return $rs["num"];
    }
}
?>