<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 5. Sentence Extractor</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<form method="post">
    <label for="text">Text: </label>
    <textarea name="text" id="text" rows="4" cols="50"></textarea><br/>
    <label for="word">Word: </label>
    <input type="text" name="word" id="word"/><br/>
    <input type="submit" value="Extract sentences"/>
</form>
<br/>
<?php
if (isset($_POST["text"]) && isset($_POST["word"])) {
    if (!empty($_POST["text"]) && !empty($_POST["word"])) {
        $sentences = preg_split('/\s*(?<=[.?!])\s+/', $_POST["text"], 0, PREG_SPLIT_NO_EMPTY);
        foreach ($sentences as $sentence) {
            $sentence = trim($sentence);
            if (preg_match('/(\s+)' . $_POST["word"] . '\1(.*)[.?!]/', $sentence)) {
                echo $sentence . "<br />";
            }
        }
    } else {
        echo "<div class=\"error\">Not all fields have been filled in.</div>";
    }
}
?>
</body>
</html>