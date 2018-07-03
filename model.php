<?php

function make_connection() {
    $mysqli = new mysqli('localhost','root','','25123_db');
    if ($mysqli->connect_errno) {
        die('Connection error: ' . $mysqli->mysqli_connect_errno . '<br>');
    }
    return $mysqli;
}

function get_articles() {
    $mysqli = make_connection();
    $query = "SELECT title FROM articles";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1');
    $stmt->bind_result($title) or die  ('Error binding results 1');
    $stmt->execute() or die ('Error executing 1');
    $results = array();
    while ($stmt->fetch()) {
        $results[] = $title;
    }
    return $results;
}

function get_some_articles() {
    global $pageno, $searchterm;
    $mysqli = make_connection();
    $firstrow = ($pageno - 1) * ARTICLES_PER_PAGE;
    $per_page = ARTICLES_PER_PAGE;
    $query  = "SELECT id, title, content, imagelink ";
    $query .= "FROM articles ";
    $query .= "WHERE title LIKE ? OR ";
    $query .= "content LIKE ? ";
    $query .= "ORDER BY article_id ";
    $query .= "DESC LIMIT $firstrow,$per_page";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1');
    $stmt->bind_param('ss',$searchterm,$searchterm) or die ('Error binding searchterm');
    $stmt->bind_result($id, $title,$content,$imagelink) or die ('Error binding results 1');
    $stmt->execute() or die ('Error executing 1');
    $results = array();
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $results[] = $article;
    }
    return $results;
}

function calculate_pages() {
    $mysqli = make_connection();
    $query = "SELECT * FROM articles ";
    $result = $mysqli->query($query) or die ('Error querying 2.');
    $rows = $result->num_rows;
    // echo 'Rows: ' . $rows;
    $number_of_pages = ceil($rows / ARTICLES_PER_PAGE);
    return $number_of_pages;
}

function get_number_of_pages() {
    $number_of_pages = calculate_pages() or die ('Error calculating');
    return $number_of_pages;
}

function login() {
//    $username  = $_POST['username'];
//    $password = $_POST['password'];
//    if ($username == 'admin' & $password == 'admin') {
//        header("Location:index.php?page=cms");
//    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['login'])) {
            $username  = $_POST['username'];
            $password = $_POST['password'];
            if ($username == 'admin' & $password == 'admin') {
                header("Location:index.php?page=cms");
            }
        } else {
            echo 'Kan niet inloggen mnjongen';
        }
    }

}



function cmstable() {
    echo '<table>';
    $mysqli = make_connection();
    $query  = "SELECT title, content, imagelink ";
    $query .= "FROM articles ";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1');
    $stmt->bind_result($title,$content,$imagelink) or die ('Error binding results 1');
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $result[] = $article;
    }
    while ($row = mysqli_fetch_array($result)) {

        $title = $row['title'];
        $content = $row['content'];
        $imagelink = $row['imagelink'];
        echo '<tr>';
        echo "<td> $title</td><td>$content</td><td>$imagelink</td>";
        echo '<td>';
        echo '<a href="delete.php?id=' .  $title . '">DELETE</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="edit.php?id=' .  $title . '&title=' . $content . '&content=' . $imagelink . '&imagelink='  . '">EDIT</a>';
        echo '</td>';
        echo '<tr>';
        echo '</table>';
    }
    echo '</table>';
}



//echo '<table>';
//$mysqli = make_connection();
//$query  = "SELECT title, content, imagelink ";
//$query .= "FROM articles ";
//$stmt = $mysqli->prepare($query) or die ('Error preparing 1');
//$stmt->bind_result($title,$content,$imagelink) or die ('Error binding results 1');
//
//echo '<tr>';
//echo "<td> $title</td><td>$content</td><td>$imagelink</td>";
//echo '<td>';
//echo '<a href="delete.php?id=' .  $title . '">DELETE</a>';
//echo '</td>';
//echo '<td>';
//echo '<a href="edit.php?id=' .  $title . '&title=' . $content . '&content=' . $imagelink . '&imagelink='  . '">EDIT</a>';
//echo '</td>';
//echo '<tr>';
//echo '</table>';