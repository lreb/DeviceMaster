<?php
/**
 *
 * @author     Ciprian Mocanu <http://www.mbe.ro> <ciprian@mbe.ro>
 * @license    Do whatever you like, just please reference the author
 * @version    1.56
 * https://mbe.ro/2009/08/30/fast-and-easy-php-mysql-class/
 */
/*class mysql {
   var $con;
   function __construct($db=array()) {
      $default = array(
         'host' => 'localhost',
         'user' => 'root',
         'pass' => '',
         'db' => 'test'
      );
      $db = array_merge($default,$db);
      $this->con=mysql_connect($db['host'],$db['user'],$db['pass'],true) or die ('Error connecting to MySQL');
      mysql_select_db($db['db'],$this->con) or die('Database '.$db['db'].' does not exist!');

      if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      else
      {
         //descomentar solo para pruebas
         echo "success to connect to MySQL: ";
      }
   }
   function __destruct() {
      mysql_close($this->con);
   }
   function query($s='',$rows=false,$organize=true) {
      if (!$q=mysql_query($s,$this->con)) return false;
      if ($rows!==false) $rows = intval($rows);
      $rez=array(); $count=0;
      $type = $organize ? MYSQL_NUM : MYSQL_ASSOC;
      while (($rows===false || $count<$rows) && $line=mysql_fetch_array($q,$type)) {
         if ($organize) {
            foreach ($line as $field_id => $value) {
               $table = mysql_field_table($q, $field_id);
               if ($table==='') $table=0;
               $field = mysql_field_name($q,$field_id);
               $rez[$count][$table][$field]=$value;
            }
         } else {
            $rez[$count] = $line;
         }
         ++$count;
      }
      if (!mysql_free_result($q)) return false;
      return $rez;
   }
   function execute($s='') {
      if (mysql_query($s,$this->con)) return true;
      return false;
   }
   function select($options) {
      $default = array (
         'table' => '',
         'fields' => '*',
         'condition' => '1',
         'order' => '1',
         'limit' => 50
      );
      $options = array_merge($default,$options);
      $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} LIMIT {$options['limit']}";
      return $this->query($sql);
   }
   function row($options) {
      $default = array (
         'table' => '',
         'fields' => '*',
         'condition' => '1',
         'order' => '1'
      );
      $options = array_merge($default,$options);
      $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']}";
      $result = $this->query($sql,1,false);
      if (empty($result[0])) return false;
      return $result[0];
   }
   function get($table=null,$field=null,$conditions='1') {
      if ($table===null || $field===null) return false;
      $result=$this->row(array(
         'table' => $table,
         'condition' => $conditions,
         'fields' => $field
      ));
      if (empty($result[$field])) return false;
      return $result[$field];
   }
   function update($table=null,$array_of_values=array(),$conditions='FALSE') {
      if ($table===null || empty($array_of_values)) return false;
      $what_to_set = array();
      foreach ($array_of_values as $field => $value) {
         if (is_array($value) && !empty($value[0])) $what_to_set[]="`$field`='{$value[0]}'";
         else $what_to_set []= "`$field`='".mysql_real_escape_string($value,$this->con)."'";
      }
      $what_to_set_string = implode(',',$what_to_set);
      return $this->execute("UPDATE $table SET $what_to_set_string WHERE $conditions");
   }
   function insert($table=null,$array_of_values=array()) {
      if ($table===null || empty($array_of_values) || !is_array($array_of_values)) return false;
      $fields=array(); $values=array();
      foreach ($array_of_values as $id => $value) {
         $fields[]=$id;
         if (is_array($value) && !empty($value[0])) $values[]=$value[0];
         else $values[]="'".mysql_real_escape_string($value,$this->con)."'";
      }
      $s = "INSERT INTO $table (".implode(',',$fields).') VALUES ('.implode(',',$values).')';
      if (mysql_query($s,$this->con)) return mysql_insert_id($this->con);
      return false;
   }
   function delete($table=null,$conditions='FALSE') {
      if ($table===null) return false;
      return $this->execute("DELETE FROM $table WHERE $conditions");
   }
}*/
?>
<?php
class Database {
 
    private $host;
    private $user;
    private $pass;
    private $name;
    private $link;
    private $error;
    private $errno;
    private $query;
 
    function __construct($host, $user, $pass, $name = "", $conn = 1) {
        $this -> host = $host;
        $this -> user = $user;
        $this -> pass = $pass;
        if (!empty($name)) $this -> name = $name;      
        if ($conn == 1) $this -> connect();
    }
 
    function __destruct() {
        @mysql_close($this->link);
    }
 
    public function connect() {
        if ($this -> link = mysql_connect($this -> host, $this -> user, $this -> pass)) {
            if (!empty($this -> name)) {
                if (!mysql_select_db($this -> name)) $this -> exception("Could not connect to the database!");
            }
        } else {
            $this -> exception("Could not create database connection!");
        }
    }
 
    public function close() {
        @mysql_close($this->link);
    }
 
    public function query($sql) {
        if ($this->query = @mysql_query($sql)) {
            return $this->query;
        } else {
            $this->exception("Could not query database!");
            return false;
        }
    }
 
    public function num_rows($qid) {
        if (empty($qid)) {         
            $this->exception("Could not get number of rows because no query id was supplied!");
            return false;
        } else {
            return mysql_num_rows($qid);
        }
    }
 
    public function fetch_array($qid) {
        if (empty($qid)) {
            $this->exception("Could not fetch array because no query id was supplied!");
            return false;
        } else {
            $data = mysql_fetch_array($qid);
        }
        return $data;
    }
 
    public function fetch_array_assoc($qid) {
        if (empty($qid)) {
            $this->exception("Could not fetch array assoc because no query id was supplied!");
            return false;
        } else {
            $data = mysql_fetch_array($qid, MYSQL_ASSOC);
        }
        return $data;
    }
 
    public function fetch_all_array($sql, $assoc = true) {
        $data = array();
        if ($qid = $this->query($sql)) {
            if ($assoc) {
                while ($row = $this->fetch_array_assoc($qid)) {
                    $data[] = $row;
                }
            } else {
                while ($row = $this->fetch_array($qid)) {
                    $data[] = $row;
                }
            }
        } else {
            return false;
        }
        return $data;
    }
 
    public function last_id() {
        if ($id = mysql_insert_id()) {
            return $id;
        } else {
            return false;
        }
    }
 
    private function exception($message) {
        if ($this->link) {
            $this->error = mysql_error($this->link);
            $this->errno = mysql_errno($this->link);
        } else {
            $this->error = mysql_error();
            $this->errno = mysql_errno();
        }
        if (PHP_SAPI !== 'cli') {
        ?>
 
            <div class="alert-bad">
                <div>
                    Database Error
                </div>
                <div>
                    Message: <?php echo $message; ?>
                </div>
                <?php if (strlen($this->error) > 0): ?>
                    <div>
                        <?php echo $this->error; ?>
                    </div>
                <?php endif; ?>
                <div>
                    Script: <?php echo @$_SERVER['REQUEST_URI']; ?>
                </div>
                <?php if (strlen(@$_SERVER['HTTP_REFERER']) > 0): ?>
                    <div>
                        <?php echo @$_SERVER['HTTP_REFERER']; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php
        } else {
                    echo "MYSQL ERROR: " . ((isset($this->error) && !empty($this->error)) ? $this->error:'') . "\n";
        };
    }
 
}
?>