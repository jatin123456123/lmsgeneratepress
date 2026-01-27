<?php
/*
Template Name: Home template
*/
get_header();
?>
<h1>Welcome Git!!!</h1>
<!-- Course Grid Start -->
<section class="home-courses">
    <div class="container">
        <div class="course-grid">
            <?php
            $args = array(
                'post_type' => 'sfwd-courses',
                'post_status' => 'publish',
                'posts_per_page' => 6, // change as needed
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $courses = new WP_Query($args);

            if ($courses->have_posts()):
                while ($courses->have_posts()):
                    $courses->the_post();
                    ?>
                    <div class="course-card">
                        <a href="<?php the_permalink(); ?>" class="course-link">

                            <?php if (has_post_thumbnail()): ?>
                                <div class="course-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <h3 class="course-title"><?php the_title(); ?></h3>

                            <div class="course-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                            </div>

                            <div class="course-btn">
                                <span class="btn-view-course">View Course</span>
                            </div>

                        </a>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No courses found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
<!-- Course Grid End -->
<?php
get_footer();
?>
