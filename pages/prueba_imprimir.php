<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>

<?php
include "../components/config/config.php";

$asa = $noticias->obtenerNoticia(1);
?>
<div class="ql-editor">
<?php
echo $asa["contenido"];

?>
</div>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    
</body>
</html>

