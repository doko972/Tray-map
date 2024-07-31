<?php
include '_database.php';
include '_config.php';

function generateToken()
{
    if (!isset($_SESSION['token']) || !isset($_SESSION['tokenExpire']) || $_SESSION['tokenExpire'] < time()) {
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        $_SESSION['tokenExpire'] = time() + 60 * 15;
    }
}

function isRefererOk(): bool
{
    global $globalUrl;
    return isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], $globalUrl);
}

function isTokenOk(?array $data = null): bool
{
    if (!is_array($data)) $data = $_REQUEST;
    return isset($_SESSION['token']) && isset($data['token']) && $_SESSION['token'] === $data['token'];
}

function addError(string $errorMsg): void
{
    if (!isset($_SESSION['errorsList'])) {
        $_SESSION['errorsList'] = [];
    }
    $_SESSION['errorsList'][] = $errorMsg;
}

function redirectTo(string $url = "index.php"): void
{
    if (headers_sent()) {
        echo "<script>location.href='$url';</script>";
    } else {
        header('Location: ' . $url);
    }
    exit;
}
function preventCSRF(string $redirectUrl = 'index.php'): void
{
    if (!isRefererOk()) {
        addError('referer');
        redirectTo($redirectUrl);
    }
    if (!isTokenOk()) {
        addError('csrf');
        redirectTo($redirectUrl);
    }
}

function validateToken($token)
{
    return $token === $_SESSION['token'];
}

/**
 * Get HTML to display errors available in user SESSION
 *
 * @param array $errorsList - Available errors list
 * @return string HTMl to display errors
 */
function getHtmlErrors(array $errorsList): string
{
    if (!empty($_SESSION['errorsList'])) {
        $errors = $_SESSION['errorsList'];
        unset($_SESSION['errorsList']);
        return '<ul class="notif-error">'
            . implode(array_map(fn ($e) => '<li>' . $errorsList[$e] . '</li>', $errors))
            . '</ul>';
    }
    return '';
}

/**
 * Get HTML to display messages available in user SESSION
 *
 * @param array $messagesList - Available Messages list
 * @return string HTML to display messages
 */
function getHtmlMessages(array $messagesList): string
{
    if (isset($_SESSION['msg'])) {
        $m = $_SESSION['msg'];
        unset($_SESSION['msg']);
        return '<p class="notif-success">' . $messagesList[$m] . '</p>';
    }
    return '';
}


/**
 * Removes tags from given array values;.
 *
 * @param array $data - input values
 */
function stripTagsArray(array &$data):array
{
    $data = array_map('strip_tags', $data);
    return $data;
}


/**
 * Gets Difficulty route.
 * @param PDO $dbCo datebase connection.
 * @return array array of difficulty.
 */
function getDifficulties(PDO $dbCo):array
{
    $query = $dbCo->prepare("SELECT * FROM `difficulty`;");
    $isQueryOk = $query->execute();
    $difficulty = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $difficulty;

}



/**
 * Gets Difficulty class route.
 * @param PDO $dbCo datebase connection.
 * @return array array of class route.
 */
function getClassRoutes(PDO $dbCo):array
{
    $query = $dbCo->prepare("SELECT * FROM `class_route`;");
    $isQueryOk = $query->execute();
    $difficulty = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $difficulty;

}






function getAllroutes(PDO $dbCo): array
{
    $query = $dbCo->prepare("SELECT * FROM `route` WHERE status = 1;");
    $isQueryOk = $query->execute();
    $routes = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $routes;
}





/**
 * Gets details for a route. created by (ayk)
 * @param PDO $dbCo database connection
 * @return array of details of route.
 */
function getRouteDetails(PDO $dbCo, int $idRoute): array
{
    $query = $dbCo->prepare("SELECT * FROM route WHERE id_route =:idRoute;");
    $isQueryOk = $query->execute(['idRoute' => $idRoute]);
    $routeDetails = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $routeDetails;
}


/** not ready yet
 * Summary of search route By name
 * @param PDO $dbCo
 * @param string $title
 * @return array
 */
function searchRouteByName(PDO $dbCo, string $title): ?array
{

    $query = $dbCo->prepare("SELECT * FROM route WHERE title like :title;");
    $isQueryOk = $query->execute(['title' => "%" . $title . "%"]);
    $routes = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $routes;
}




/**not ready yet
 * constructs a sql request from params of research.
 * example of data $data = [
 *    'title' => "hello",
 *     'distance' => "5",
 *    "id_diffuclty" => "2",
 *    "id_class_route" => "2"
 * ];
 * 
 * @param array $inputData array of parameters like example.
 * @return string sql request.
 */

/**
 * construct sql request from search params of routes.
 * @param array $inputData
 * @return array
 */
function constructSqlSearchRoute($inputData): array
{
    $dataStrip = stripTagsArray($inputData);
    $data = paramsToInt($dataStrip);
    $bind = [];
    $request = [];
    $startRequest = "SELECT * FROM route WHERE";

    if (empty($data)) {
        addError("sea rch_ko");
        redirectTo();
    }

    if (isset($data["id_class_route"])) {
        $startRequest = 'SELECT * FROM `route` JOIN categorize
     USING (id_route) WHERE ';
        $request[] = 'id_class_route  =  :idClassRoute';
        $bind['idClassRoute'] = $data["id_class_route"];
    }

    if (isset($data['title'])) {

        $request[] = ' title Like :title ';
        $bind['title'] = '%' . $data["title"] . '%';
    }


    if (isset($data['distance'])) {

        $request[] = ' distance <= :distance';
        $bind['distance'] = $data["distance"];
    }

    if (isset($data['difficulty'])) {

        $request[] = ' difficulty = :difficulty';
        $bind['difficulty'] = $data["difficulty"];
    }

    $finalData["sqlRequest"] = $startRequest . implode(' AND ', $request);
    $finalData["bind"] = $bind;
    return  $finalData;
}





/**
 * Gets the routes from search paramas(data);
 * @param PDO $dbCo database connection.
 * @param array $data params de search
 * @return array of routes
 */
function getRoutesBySearchParam(PDO $dbCo, array $data): array
{
    $finalData = constructSqlSearchRoute($data);
    // var_dump($request);
    $query = $dbCo->prepare($finalData["sqlRequest"]);
    $isQueryOk = $query->execute($finalData["bind"]);
    $routes = $query->fetchAll();

    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $routes;
}



/**
 * if the value isnt numeric will call addError() and redirectTo()
 * @param mixed $value 
 * @return void 
 */
function isNumericInt($value): void
{
    if (!is_numeric($value)) {
        addError('Numeric_KO');
        redirectTo();
    }
}



/**
 * Converts numeric values to int.
 * @param array $data array 
 * @return array modified array
 */
function paramsToInt($data):array
{
    foreach ($data as $key => &$value) {

        if ($key === 'title') continue;
        if ($key === 'description') continue;
        isNumericInt($value);
        $value = intval($value);
    }
    return $data;
}
