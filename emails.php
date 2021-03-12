<?php
include_once 'classes/EmailController.php';
$ec=new EmailController();
if (array_key_exists("sort",$_GET)&&array_key_exists("search",$_GET)) {
    if(array_key_exists("checkedPr",$_GET)) $emails=$ec->index($_GET["sort"],$_GET["search"],$_GET["checkedPr"]);
    else $emails=$ec->index($_GET["sort"],$_GET["search"]);
    $providers=$ec->providers;
}
else {
    $emails=$ec->index();
    $providers=$ec->providers;
}
?>
<html lang="en">
    <head>
        <title>Emails</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/table.css">
        <script src="/js/CheckAll.js"></script>
    </head>
    <body>
        <h1>Emails</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <label for="sort">Sort by: </label>
            <select name="sort" id="sort">
                <option value="0" selected>Date ascending</option>
                <option value="1">Date descending</option>
                <option value="2">Email ascending</option>
                <option value="3">Email descending</option>
            </select>
            <label for="search">Search:</label>
            <input type="text" name="search" id="search">
            <div>
                <div>Filter out providers:</div>
                <?php foreach ($providers as $provider): ?>
                    <label>
                        <input type="checkbox" name="checkedPr[]" value="<?php echo $provider ?>">
                        <?php echo strtoupper($provider) ?>
                    </label>
                    <br>
                <?php endforeach; ?>
            </div>
            <input type="submit" value="Sort/Search/Filter">
        </form>
        <form action="delete_export.php" method="get">
            <button type="submit" value="0" name="btn">Delete selected</button>
            <button type="submit" value="1" name="btn">Export selected as CSV</button>
            <table>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                </tr>
                <?php for($i=0;$i<count($emails);$i++): ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $emails[$i]["date"] ?></td>
                        <td><?php echo $emails[$i]["email"] ?></td>
                        <td><input type="checkbox" name="checked[]" value="<?php echo $emails[$i]["ID"]?>"></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </form>
    </body>
</html>