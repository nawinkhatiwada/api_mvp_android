<?php
header('Content-Type: application/json');

/**
 * PHP Class
 *
 * @author Dinesh Gajurel(gajureldns)
 * @Date
 * @usage
 * @References
 */
class Mvp_android
{
    /**
     * db connection instance
     * @var conn
     */
    protected $_conn;

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
     * @param $title
     * @param $description
     * @return bool|mysqli_result
     */
    function add($title, $description)
    {
        $sql = "INSERT INTO recent_tags(title,description) VALUES('$title','$description')";
        $result = $this->_conn->query($sql);
        return $result;
    }

    //    -------------------------------------------------------------------

    /**
     * @param $credential
     * @return jsonArray
     */
    function login($credential)
    {
        $username = $credential['username'];
        $password = $credential['password'];
        $response = NULL;
        // if ($username == null || $password == null) {
        //  $response = array(
        // 'status_code' => 0,
        // 'statusMessage' => "parameter expected",
        // 'response' => null
        // );
        // return json_encode($response);
        // }

        $sql = "SELECT id, username,password FROM user_info where username='$username' and password='$password'";
        $result = $this->_conn->query($sql);
        $row = mysqli_fetch_array($result);
        if (($row["username"] != $credential['username']) || ($row["password"] != $credential['password'])) {
            $response = array(
                'statusCode' => -1,
                'statusMessage' => "Invalid Credentials",
                'response' => null
            );
            return json_encode($response);
        }

        if ($result->num_rows > 0) {
            $response = array(
                'statusCode' => 1,
                'statusMessage' => "success",
                'response' => [
                    'id' => $row["id"],
                    'username' => $row["username"],
                ]
            );

        } else {
            $response = array(
                'statusCode' => -1,
                'statusMessage' => "Unknown Error Occurred !!!",
                'response' => null
            );
        }

        return json_encode($response);
    }

    //    -------------------------------------------------------------------


    /**
     * @param $limitArray
     * @return jsonArray
     */
    function recentTags($data)
    {
        $offset = $data['offset'];
        $limit = $data['limit'];
        $response = NULL;


        if ((!$data['offset'] < 0) || (!$data['limit'] <= 0)) {

            $sqlItemCount = "Select count(*) from recent_tags";
            $resultItemCount = $this->_conn->query($sqlItemCount);
            $itemRow = mysqli_fetch_array($resultItemCount);
            (int)$itemCount = $itemRow[0];

            if ($itemCount > 0) {

                $sql = "select id,title,description from recent_tags order by id asc LIMIT $limit OFFSET $offset";
                $result = $this->_conn->query($sql);
                $items = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $item = array(
                            'id' => (int)$row["id"],
                            'title' => $row["title"],
                            'description' => $row["description"]
                        );
                        array_push($items, $item);
                    }
                }
                $response = array(
                    'statusCode' => 1,
                    'statusMessage' => "success",
                    'response' => [
                        'itemCount' => (int)$itemCount,
                        'items' => $items
                    ]
                );

                return json_encode($response);
            } else {
                $response = array(
                    'statusCode' => 1,
                    'statusMessage' => "success",
                    'response' => [

                    ]
                );
                return json_encode($response);
            }

        } else {
            $response = array(
                'statusCode' => -1,
                'statusMessage' => "Unknown Error Occurred !!!",
                'response' => null
            );
            return json_encode($response);
        }

    }
//---------------------------------------------------------------------------------------

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