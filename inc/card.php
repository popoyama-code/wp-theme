<figure class="card card--shadow">
    <div class="card__thumbnail">
        <?php the_post_thumbnail('grid-thumbnail'); ?>
        <a href="<?php the_permalink(); ?>" class="card__overlay">
            <div class="card__metadata">
                <ul class="card__tag-list">
                <?php
                    $posttags = get_the_tags();
                    if ( $posttags ) {
                        foreach ( $posttags as $tag ) {
                            echo '<li class="card__tag-item">'. $tag->name . '</li>'; 
                        }
                    }
                ?>
                </ul>
            </div>
        </a>
    </div>
    <figcaption class="card__title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </figcaption>
</figure>