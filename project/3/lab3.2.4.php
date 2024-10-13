<?php
// List of search engine sites
$list_sites = array(
    "https://www.google.com/search?q=" => "Google",
    "https://www.bing.com/search?q=" => "Bing",
    "https://www.yahoo.com/search?p=" => "Yahoo",
    "https://duckduckgo.com/?q=" => "DuckDuckGo",
);

if (isset($_GET['site'])) {
    // Redirect to the selected search engine site
    $site = $_GET['site'];
    if (array_key_exists($site, $list_sites)) {
        header("Location: $site");
        exit();
    }
}

// Display the form with a drop-down list of search engine sites
echo "<form action=\"\" method=\"get\">\n";
echo "<label for=\"site\">Select a search engine:</label>\n";
echo "<select name=\"site\" id=\"site\">\n";
foreach ($list_sites as $url => $name) {
    echo "<option value=\"$url\">$name</option>\n";
}
echo "</select>\n";
echo "<input type=\"submit\" value=\"Go\">\n";
echo "</form>\n";
?>