<?php

$items = $v['items'];
?>
<nav class="nav nav-masthead justify-content-center">
    <?php foreach ($items as $item):
        $sClass = (true === $item['active']) ? 'active' : '';
        ?>
        <a class="nav-link <?php echo $sClass; ?>" href="<?php echo $item['link']; ?>"><?php echo $item['label']; ?></a>
    <?php endforeach; ?>
</nav>