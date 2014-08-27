<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Text Filter</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form method="post">
    <label for="text">Text: </label>
    <textarea name="text" id="text" rows="4" cols="50"></textarea><br/>
    <label for="banList">Ban list: </label>
    <input type="text" name="banList" id="banList"/><br/>
    <input type="submit" value="Filter"/>
</form>
<br/>
<?php
if (isset($_POST["text"]) && isset($_POST["banList"])) {
    if (!empty($_POST["text"]) && !empty($_POST["banList"])) {
        $text = $_POST["text"];
        $bannedWords = preg_split('/[,\s+]+/', $_POST["banList"], -1, PREG_SPLIT_NO_EMPTY);
        foreach ($bannedWords as $bannedWord) {
            $text = preg_replace_callback('/' . $bannedWord . '/', function ($elements) {
                $length = mb_strlen($elements[0]);
                return str_repeat("*", $length);
            }, $text);
        }
        echo $text;
    } else {
        echo "<div class=\"error\">Not all fields have been filled in.</div>";
    }
}
?>
</body>
</html>