<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= get_bloginfo('description') ?>">
<title><?= get_bloginfo('name') ?> - <?= get_bloginfo('description') ?></title>
<script>
    window.rest_url = "<?= get_rest_url() ?>";
</script>
<?= wp_head() ?>
</head>