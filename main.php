<?php
include "db_connection.php";
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

    private $connection;

    function __construct()
    {
        $this->connection = new Db_connection();
    }


    /**
     * @param $credential
     * @return jsonArray
     */
    function login($credential)
    {
        $username = $credential['username'];
        $password = $credential['password'];
        $response = NULL;

        $sql = "SELECT id, username,password FROM user_info where username='$username' and password='$password'";
        $result = $this->connection->_conn->query($sql);
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
            $resultItemCount = $this->connection->_conn->query($sqlItemCount);
            $itemRow = mysqli_fetch_array($resultItemCount);
            (int)$itemCount = $itemRow[0];

            if ($itemCount > 0) {

                $sql = "select id,title,description from recent_tags order by id asc LIMIT $limit OFFSET $offset";
                $result = $this->connection->_conn->query($sql);
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
                        'itemCount' => 0,
                        'items' => []
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

}