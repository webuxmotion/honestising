<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Your Name">
  <?=$this::getMeta(); ?>
  <link rel="icon" type="image/png" href="/favicon.png" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/<?=codeTheme()?>.min.css">
  <link href="/dist/styles.css" rel="stylesheet">
</head>
<body>
  <div class="content">
    <?=$this->component('header')?>
    <?=$content?>
  </div>
  
  <script>
    var serverUrl = "<?=siteUrl()?>";
    const PATH = '<?= PATH ?>';
  </script>
  

  <script src="/dist/app.js"></script>
  <?=$scripts?>
</body>
</html>
