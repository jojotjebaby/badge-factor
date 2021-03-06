<section class="profile-organisation-badges">
    <div id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <section class="badge-summary">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="text-align:center;">
                        <?php echo get_the_post_thumbnail($post, 'full'); ?>
                        <div style="margin-top:15px;">
                            <h4><?php _e('Issued by', 'badgefactor'); ?></h4>
                            <a href="<?php echo $GLOBALS['badgefactor']->get_badge_issuer_url($post->ID); ?>" style="text-decoration:none; font-size:15px;"><?php echo $GLOBALS['badgefactor']->get_badge_issuer_name($post->ID); ?></a>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                        <a class="btn btn-default" href="<?php echo $GLOBALS['badgefactor']->get_badge_page_url($post->ID); ?>"><?php _e('Take this course', 'badgefactor'); ?></a>
                        <h2><?php echo $post->post_title; ?></h2>
                        <h3 class="badge-description-heading"><?php _e('Description', 'badgefactor'); ?></h3>
                        <?php echo wpautop($post->post_content); ?>

                        <h3 class="badge-criteria-heading"><?php echo $GLOBALS['badgefactor']->get_badge_criteria_title($post->ID); ?></h3>
                        <?php echo wpautop($GLOBALS['badgefactor']->get_badge_criteria($post->ID)); ?>
                    </div>
                </section>
            </div>
            <div class="row">
                <section class="badge-members">
                    <div class="badge-members-heading col-xs-12">
                        <h3 class="badges-unique-members-heading-title">
                            <?php _e('Members who obtained this badge', 'badgefactor'); ?> <small class="badge-members-count"><?php echo $GLOBALS['badgefactor']->get_nb_badge_earners($post->ID); ?> <?php _e('People', 'badgefactor'); ?></small>
                        </h3>
                    </div>
                    <?php if ($GLOBALS['badgefactor']->get_nb_badge_earners($post->ID) === 0): ?>
                    <div class="badge-member col-xs-12">
                        <?php _e('No one has earned this badge for the moment.', 'badgefactor'); ?>
                    </div>
                    <?php else: ?>
                        <?php foreach ($GLOBALS['badgefactor']->get_badge_earners($post->ID) as $member): ?>
                            <div class="badge-member col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                <figure class="badge-member-figure">
                                    <a href="<?php echo bp_core_get_user_domain($member->ID); ?>" class="badge-member-link">
                                        <?php echo get_avatar($member->ID, 140); ?>
                                    </a>
                                    <figcaption class="badge-member-name">
                                        <a href="<?php echo bp_core_get_user_domain($member->ID); ?>" class="badge-member-link">
                                            <?php echo bp_core_get_user_displayname($member->ID); ?>
                                        </a>
                                    </figcaption>
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</section>