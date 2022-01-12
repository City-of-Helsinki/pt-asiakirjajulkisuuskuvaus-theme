<?php

/**
 * Accordion Section Template.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'acs-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-section';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}

$title = get_field('title');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h2 class="acs-title"><?= $title ?></h2>
    <?php if( have_rows('accordion_items') ): ?>
        <div class="acs-items">
            <?php while( have_rows('accordion_items') ) : the_row(); 
                $title = get_sub_field('title');
                $content = get_sub_field('content');
            ?>
                <div class="acs-item">
                    <div class="acs-item-title">
                        <h3><?= $title ?></h3>
                        <i class="hds-icon hds-icon--angle-down hds-icon--size-m" aria-hidden="true"></i>
                    </div>
                    <div class="acs-item-content"><?= $content ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>