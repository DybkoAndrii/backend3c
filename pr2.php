<?php
// !!! TODO 1: ваш код обробки GET запиту; виконання запиту через cURL упошукову систему; підготовка даних для малювання
if(isset($_GET['search'])) {
    // Отримання пошукового запиту з форми
    $search_query = $_GET['search'];
    $cx = "572df665a52354908";
    $apiKey = "AIzaSyBhAdmZgMy5xj-DDVg00uoLJOy46Dsx4DA";
    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search_query}";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);
    if(isset($result['items'])) {
        $items = $result['items'];
    } else {
        $items = array();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/pr2.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>
<?php
// !!! TODO 2: код відображення відповіді
if(isset($items)) {
    echo "<h2>Search Results</h2>";
    echo "<ul>";
    foreach($items as $item) {
        if(isset($item['title']) && isset($item['link'])) {
            $title = $item['title'];
            $link = $item['link'];
            echo "<li><a href='{$link}'>{$title}</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>No search results found.</p>";
}
?>
</body>
</html>