<h2>1. Setup project</h2>

<?=doc('clone-doc.sh', [
  'alias' => $alias,
  'lang' => 'bash'
])?>

<p>1.1 - Go to phpMyAdmin <a href="http://localhost:40002/" target="_blank">http://localhost:40002/</a></p>
<p>Use this credentials: <br>

Username: user<br>
Password: password
</p>

<img src="/images-tuts/<?=$alias?>/php-my-admin-1.png">

<p>1.2 - Import database DB.sql</p>

<img src="/images-tuts/<?=$alias?>/php-my-admin-2.png">
<img src="/images-tuts/<?=$alias?>/php-my-admin-3.png">
<img src="/images-tuts/<?=$alias?>/php-my-admin-4.png">
<img src="/images-tuts/<?=$alias?>/php-my-admin-5.png">
<img src="/images-tuts/<?=$alias?>/php-my-admin-6.png">
<img src="/images-tuts/<?=$alias?>/php-my-admin-7.png">

<h2>2. Start webpack</h2>

<?=doc('npm-start.sh', [
  'alias' => $alias,
  'lang' => 'bash'
])?>

<h2>3. Go to site</h2>
<p>Go to <a href="http://localhost:40001/" target="_blank">http://localhost:40001/</a></p>