<html>
<head>
<title>workshop</title>
<link href ="web.css" rel="stylesheet">
</head>
<body>
<div class="header">
<h1>Header Web</h1>
</div>
<div class="container">
  content
  <form method = "POST" action = "process.php">
    <label>Input Content 1</label>
    <input type = "text" name = "content[]" placeholder = "content 1">
    <label>Input Content 2</label>
    <input type = "text" name = "content[]" placeholder = "content 2">
    <label>Input Content 3</label>
    <input type = "text" name = "content[]" placeholder = "content 3">
    <label>Input Content 4</label>
    <input type = "text" name = "content[]" placeholder = "content 4">
    <input type = "submit" value="submit">
  </form>
  <div id="content-js"></div>
  <input type ="text" id="input_js">
</div>
<script src ="web.js"></script>
</body>
</html>
