<?php
class Db_connection {


    /**
     * db connection instance
     * @var conn
    //     */
     var $_conn=NULL;
    /**
     * Success message(Connection OK!)
     * @var bool|null
     */
    var $_success = NULL;

    /**
     * Error message(Exception/Configuration Error)
     * @var null|string
     */
    var $_error = NULL;

    /**
     * Connection configuration/constants
     */
//    const PASSWORD = "toxic555";
//    const HOST = "localhost";
//    const USERNAME = "id2040020_nawinkhatiwada";
//    const DB = "id2040020_mvp_android";
//    const TIMEOUT = "10";


    const PASSWORD = "admin";
    const HOST = "localhost";
    const USERNAME = "admin";
    const DB = "mvp_android";
    const TIMEOUT = "10";


    // -------------------------------------------------------------

    /**
     * constructor.
     */
    function __construct()
    {
        try {
            $this->_conn = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB);
            if (!$this->_conn) {
                $this->_error = "connection error";
            }
            $this->_success = true;

        } catch (Exception $e) {
            $this->_error = $e->getMessage();
        }
    }

    //    -------------------------------------------------------------------

    /**
     * destructor
     */
    function __destruct()
    {
        try {
            if ($this->_conn) {
                $this->_conn->close();
            }
        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }


}