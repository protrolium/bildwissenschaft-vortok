<?= $rockfrontend->renderIf("sections/default-page.latte", "parent=archive") ?>
<?= $rockfrontend->renderIf("sections/archive.latte", "name=archive") ?>
<?= $rockfrontend->renderIf("sections/about.latte", "name=about") ?>
<?= $rockfrontend->renderIf("sections/tag.latte", "template=tag") ?>
<?= $rockfrontend->renderIf("sections/cv.latte", "template=cv") ?>