<?php foreach ($listCategoryNews as $key => $news): ?>
    <div style="border: 1px solid green;">
        <h1><a href="<?= route('news.showCategory', ['category' => $news]) ?>"><?= $news ?></a></h1>
        <br>
    </div>
    <br>
    <hr>
<?php endforeach; ?>
