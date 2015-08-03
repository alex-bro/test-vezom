<p class="pagination">

    <?php if ($first_page !== FALSE): ?>
        <a href="<?php echo $page->url($first_page) ?>" rel="first"><?php echo __('First') ?></a>
    <?php else: ?>
        <?php echo __('First') ?>
    <?php endif ?>

    <?php if ($previous_page !== FALSE): ?>
        <a href="<?php echo $page->url($previous_page) ?>" rel="prev"><?php echo __('Previous') ?></a>
    <?php else: ?>
        <?php echo __('Previous') ?>
    <?php endif ?>

    <?php
    /* max left links */
    $offset = $total_pages - ($total_pages - $current_page);

    $left = $offset > $max_left_pages ? $max_left_pages : $offset;

    if ($offset > 1)
        for ($i = $offset - $left + 1; $i < $offset; $i++):
            ?>

            <a href="<?php echo $page->url(abs($i)) ?>"><?php echo abs($i) ?></a>

        <?php endfor ?>

    <?php
    /* max right links */
    $right = $current_page + $max_right_pages;

    for ($i = $current_page; $i <= $right && $i <= $total_pages; $i++):
        ?>

        <?php if ($i == $current_page): ?>
            <strong><?php echo $i ?></strong>
        <?php else: ?>
            <a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
        <?php endif ?>

    <?php endfor ?>

    <?php if ($next_page !== FALSE): ?>
        <a href="<?php echo $page->url($next_page) ?>" rel="next"><?php echo __('Next') ?></a>
    <?php else: ?>
        <?php echo __('Next') ?>
    <?php endif ?>

    <?php if ($last_page !== FALSE): ?>
        <a href="<?php echo $page->url($last_page) ?>" rel="last"><?php echo __('Last') ?></a>
    <?php else: ?>
        <?php echo __('Last') ?>
    <?php endif ?>

</p><!-- .pagination -->