<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
    <title>イッヌハブ（デモ）</title>
</head>
<body>

<div id="container">

<?php foreach ($recent_amikkos as $recent_amikko) : ?>
    <div style="float:left">
        <img src="data:image/png;base64,<?php echo $recent_amikko['file'] ?>" alt="<?php echo $recent_amikko['message'] ?>">
    </div>
    <div style="float:left;margin: 0 -1px">
        <svg viewbox="0 0 30 30" width="30" height="30">
            <circle cx=16 cy=16 r=13 fill='#ffffff' stroke-width=1 stroke='black'/>
        </svg>
    </div>
<?php endforeach; ?>

</div>

</body>
</html>