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

/**
 * Add a new message to display on next page. 
 *
 * @param string $message - Message to display
 * @return void
 */
function addMessage(string $message): void
{
    if (!isset($_SESSION['msg'])) {
        $_SESSION['msg'] = [];
    }
    $_SESSION['msg'][] = $message;
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
function stripTagsArray(array &$data): array
{
    $data = array_map('strip_tags', $data);
    return $data;
}


/**
 * Gets Difficulty route.
 * @param PDO $dbCo datebase connection.
 * @return array array of difficulty.
 */
function getDifficulties(PDO $dbCo): array
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
 * Adds html tages to difficulty.
 * @param array $difficulty
 * @return string html tages string
 */
function AddsHtmlDifficulty($difficulty): string
{
    return '<input type="radio" id="' . $difficulty["name"] . '" name="difficulty" value="' . $difficulty["id_difficulty"] . '">
    <label for="easy">' . $difficulty["name"] . '</label><br>';
}


/**
 * Adds html tages to class routes.
 * @param array $classRoute
 * @return string html tages string
 */
function AddsHtmlClassRoute($classRoute): string
{
    return '<input type="radio" id="' . $classRoute["class_name"] . '" name="class_route" value="' . $classRoute["id_class_route"] . '">
    <label for="' . $classRoute["class_name"] . '">' . $classRoute["class_name"] . "</label><br>";
}


/**
 * Gets Difficulty class route.
 * @param PDO $dbCo datebase connection.
 * @return array array of class route.
 */
function getClassRoutes(PDO $dbCo): array
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





// /**
//  * Gets details for a route. created by (ayk)
//  * @param PDO $dbCo database connection
//  * @return array of details of route.
//  */
// function getRouteDetails(PDO $dbCo, int $idRoute): array
// {
//     $query = $dbCo->prepare("SELECT * FROM route WHERE id_route =:idRoute;");
//     $isQueryOk = $query->execute(['idRoute' => $idRoute]);
//     $routeDetails = $query->fetchAll();

//     if (!$isQueryOk) {
//         addError('select_ko');
//         redirectTo();
//     }
//     return $routeDetails;
// }


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
function constructSqlSearchRoute($data): array
{
    var_dump($data);
    $bind = [];
    $request = [];
    $startRequest = "SELECT id_route FROM route WHERE";

    if (empty($data)) {
        addError("search_ko");
        redirectTo();
    }

    if (isset($data["class_route"])) {
        $startRequest = 'SELECT * FROM `route` JOIN categorize
     USING (id_route) WHERE ';
        $request[] = 'id_class_route  =  :idClassRoute';
        $bind['idClassRoute'] = intval($data["class_route"]);
    }

    if (isset($data['title'])) {

        $request[] = ' title Like :title ';
        $bind['title'] = '%' . $data["title"] . '%';
    }


    if (isset($data['distance'])) {

        $request[] = ' distance <= :distance';
        $bind['distance'] = intval($data["distance"]);
    }

    if (isset($data['difficulty'])) {

        $request[] = ' difficulty = :difficulty';
        $bind['difficulty'] = intval($data["difficulty"]);
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

    $query = $dbCo->prepare($data["sqlRequest"]);
    $isQueryOk = $query->execute($data["bind"]);
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
 * @return int the int value of the input.
 */
function numericInt($value, $redirectURL): ?int
{
    if (!isset($value)) {
        addError('set_KO');
        redirectTo($redirectURL);
    }
    if (!is_numeric($value)) {
        addError('numeric_KO');
        redirectTo($redirectURL);
    }
    return intval($value);
}



/**
 * Converts numeric values to int.
 * @param array $data array 
 * @return array modified array
 */
function paramsToInt($data): array
{
    foreach ($data as $key => &$value) {

        if ($key === 'title') continue;
        // isNumericInt($value);
        $value = intval($value);
    }
    return $data;
}

function getRouteDetails(PDO $dbCo, $idRoute)
{
    $query = $dbCo->prepare("SELECT id_route, illustration_img, URL, alt, title, distance, difficulty, description
                            FROM illustrer
                                JOIN route USING(id_route)
                                JOIN img USING (id_img)
                                JOIN categorize USING(id_route)
                                JOIN class_route USING(id_class_route)
                            WHERE is_main = 1 AND id_route = :idRoute;");

    $isQueryOk = $query->execute(["idRoute" => $idRoute]);
    $route = $query->fetchAll();
    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $route;
}



// INSERT INTO table (nom_colonne_1, nom_colonne_2, ...
//  VALUES ('valeur 1', 'valeur 2', ...)
function addNewRouteWithoutImg(PDO $dbCo, $data)
{
    $query = $dbCo->prepare("INSERT INTO route (title, distance, difficulty,
    status, id_person, description,time_stamp )
    VALUES (:title,:distance ,:difficulty,:status,:idPerson , :discription, :timeStamp)
     ");

    $isQueryOk = $query->execute([
        "title" => $data['title'],
        "distance" => $data['distance'],
        "difficulty" => $data['difficulty'],
        "status" => $data['status'],
        "idPerson" => $data['idPerson'],
        "discription" => $data['discription'],
        "timeStamp" => $data['timeStamp']
    ]);
    $route = $query->fetchAll();
    if (!$isQueryOk) {
        addError('select_ko');
        redirectTo();
    }
    return $route;
}
