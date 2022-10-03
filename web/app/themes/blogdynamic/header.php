<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= get_bloginfo('name') ?> - <?= get_bloginfo('description') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script>
    window.rest_url = "<?= get_rest_url() ?>";
</script>
<?= wp_head() ?>
</head>