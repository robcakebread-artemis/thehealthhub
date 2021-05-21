<?php if ($accordion_id):
    $count = count(get_field('accordions', $accordion_id));
    $add_schema = get_field('add_schema_markup', $accordion_id);
    $style = ($style ? $style : 'style-0');
    $cnt = 0;
    $col_break = '';

    //defaults
    $show_toggle = true;
    $expanded = false;

    if ($two_col):
        $cnt = 1;
        if ($count):
            $col_break = ceil($count / 2);
        endif;
    endif;

    if ($style == 'style-1'):
        $show_toggle = false;
    elseif ($style == 'style-2'):        
        $show_toggle = false;
        $expanded = true;
    endif;
?><?php
    if (have_rows('accordions', $accordion_id)) :
        $schema = '';
    ?>
        <div class="faq accordion <?= $style; ?>">
            <dl class="<?= ($show_toggle == false ? 'no-toggle' : ''); ?><?= ($expanded ? ' expanded' : ''); ?><?= ($two_col ? ' two-col' : ''); ?>">
        <?php  
            while( have_rows('accordions', $accordion_id) ): the_row(); 
                $icon = get_sub_field('accordion_icon_name');
                $acc_content = get_sub_field('accordion_content');
                $class = '';

                if ($acc_content == ''):
                    $show_toggle = false;
                    $cnt = 999;
                endif;

        ?>
            <dt class="accordion-toggle<?= ($expanded ? ' expanded' : '');?><?= ($acc_content == '' ? ' no-events' : '');?><?= ($cnt == 0 || $expanded ? ' active open' : '');?><?= ($icon ? ' with-icon' : '');?>">
                <?= get_sub_field('accordion_title');?>
                <?php if ($icon): echo get_icon($icon); endif; ?>
                <?php if ($show_toggle): ?><div class="arrow-wrapper"><button class="arrow<?= ($cnt == 0 || $expannded ? ' open' : '');?>" title="Accordion Toggle"></button></div><?php endif; ?>                    
            </dt>
            <dd class="accordion-content"<?= ($cnt == 0 || $expanded  ? ' style="display: block;"' : '');?>>
                <?= get_sub_field('accordion_content');?> 
            </dd>
        <?php  

                if ($col_break):
                    if ($col_break == ($cnt)):
                ?>
                        <dt class="column-break"></dt>
                <?php
                    endif;
                endif;
                        
                if ($add_schema):
                    $schema_link = get_sub_field('accordion_read_more', $accordion_id);
                    if( $schema_link ): 
                        $schema_link = "<a href='" . $schema_link . "'> Click to read more</a>";
                    endif;                
                    $schema .= '{"@type":"Question","name":"' . get_sub_field('accordion_title') . '","acceptedAnswer":{"@type":"Answer","text":"' . str_replace("\"", "'", get_sub_field('accordion_content'))  . $schema_link . '"}},'; 
                endif;

                $cnt++;
            endwhile; 
        ?>
        <?php
        endif;
        ?>
            </ul>
        </div>
    <?php
        if ($count > 0 && $add_schema) :
            $schema_name = get_field('schema_markup_name', $accordion_id);
    ?>
	    <script type="application/ld+json">
            {"@context":"https://schema.org","@type":"FAQPage","name":"<?= ($schema_name ? $schema_name : 'FAQ Page'); ?>","mainEntity":[  <?= rtrim($schema, ','); ?> ]}
        </script>

    <?php   
	    endif;
    ?>
<?php endif; ?>