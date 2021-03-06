<div id="wpjb-main" class="wpjr-page-my-applications">

    <?php wpjb_flash() ?>
    
    <table id="wpjb-resume-list" class="wpjb-table">
        <thead>
            <tr>
                <th><?php _e("Job", "wpjobboard") ?></th>
                <th><?php _e("Sent", "wpjobboard") ?></th>
                <th class="wpjb-last"><?php _e("Status", "wpjobboard") ?></th>
            </tr>
        </thead>
        <tbody>

            <?php if ($result->count > 0) : foreach($result->application as $app): ?>
            <?php /* @var $app Wpjb_Model_Application */ ?>
            <tr>
                <td>
                    <a href="<?php esc_attr_e(wpjb_link_to("job", $app->getJob())) ?>"><?php esc_html_e($app->getJob()->job_title) ?></a>
                    <?php _e("at", "wpjobboard") ?>
                    <?php esc_html_e($app->getJob()->company_name) ?>
                </td>
                <td><?php esc_html_e(sprintf("%s ago", daq_distance_of_time_in_words($app->time->applied_at))) ?></td>
                <td class="wpjb-last"><?php echo (wpjb_application_status($app->status, true)) ?></td>
            </tr>
            <?php endforeach; else :?>
            <tr>
                <td colspan="3" align="center">
                    <?php _e("You did not sent any applications yet.", "wpjobboard"); ?>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div id="wpjb-paginate-links">
        <?php wpjb_paginate_links($url, $result->pages, $result->page, $query) ?>
    </div>

</div>