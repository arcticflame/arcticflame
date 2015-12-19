<?php
class Connection {
    private $db                 = 	null;     # The PDO object
    private $options;           = 	null;     # Options used when creating the PDO object
    private $stmt               = 	null;     # The latest statement used to execute a query
    private static $numQueries  = 	0;        # Count all queries made
    private static $queries     = 	array();  # Save all queries for debugging purpose
    private static $params      = 	array();  # Save all parameters for debugging purpose

    public function __construct($options) {
        $default = array(
            'dsn' => null,
            'username' => null,
            'password' => null,
            'driver_options' => null,
            'fetch_style' => PDO::FETCH_OBJ
        );

        $this->options = array_merge($default, $options);

        try {
            $this->db = new PDO($this->options['dsn'], $this->options['username'], $this->options['password'], $this->options['driver_options']);
        }
        catch(Exception $e) {
            throw new PDOException('Could not connect to database, connection lost.');
        }

        $this->db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']);
    }

    public function query($sql) {
    	return $this->db->query($sql);
    }

    public function prepare($sql) {
    	return $this->db->prepare($sql);
    }

    public function execute($params = array()) {
    	$exec = $this->db->execute($params);

    	if($exec)
    		return true;
    	else
    		return false;
    }

    public function prepareExecute($sql, $params) {
    	$q = $this->db->prepare($sql);
    	$exec = $this->db->execute($params);

    	if($exec)
    		return true;
    	else
    		return false;
    }

    public function fetch() {
    	return $this->db->fetch();
    }

    public function fetchAll() {
    	return $this->db->fetchAll();
    }
}