<?php
// Copyright (c) 2008 Eric Biven
// Released under the FreeBSD license:
// http://www.freebsd.org/copyright/freebsd-license.html
//
// For Recently Popular 0.7.2

require_once('include.php');

class RecentlyPopularWidget extends WP_Widget {
    
    /*
     * Standard PHP object property handlers. Allow any property to be created/set/removed for 
     * flexibility in case someone decides to extend the plugin. Caveat emptor.
     */
    private $data = array();
    public function __set($name, $value) { $this->data[$name] = $value; }
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        
    } 
    
    public function RecentlyPopularWidget() {
        $this->data = &RecentlyPopularUtil::$defaults;
        add_action('widgets_init', array(&$this, 'init'));
        $widget_ops = array('classname' => 'RecentlyPopularWidget', 'description' => 'Shows recently popular posts');
        $control_ops = array('id_base' => 'recently-popular', 'width' => '400');
        parent::WP_Widget('recently-popular', 'Recently Popular', $widget_ops, $control_ops);
    }
    
    public function init() {
        register_widget('RecentlyPopularWidget');
    }
    
    public function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $args['title'] = apply_filters('widget_title', $instance['title']);
        ?>
            <?php echo($before_widget); ?>
                <?php echo($before_title . $args['title'] . $after_title); ?>
                    <ul>
                        <?php
                        $rp = new RecentlyPopular();
                        $rp->get_counts($instance);
                        ?>
                    </ul>
            <?php echo($after_widget); ?>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance['categories'] = '';
        if (isset($new_instance['categories'])) {
            foreach ($new_instance['categories'] as $category) {
                $instance['categories'] .= "'".strip_tags($category)."',";
            }
        }
        $instance['categories'] = strip_tags(rtrim((string)$instance['categories'], ','));
        $instance['date_format'] = strip_tags($new_instance['date_format']);
        $instance['default_thumbnail_url'] = strip_tags($new_instance['default_thumbnail_url']);
        $instance['display'] = true;
        $instance['enable_categories'] = ($new_instance['enable_categories'] == '1') ? '1' : '0';
        $instance['interval_length'] = intval($new_instance['interval_length']);
        $instance['interval_type'] = strip_tags($new_instance['interval_type']);
        $instance['limit'] = intval($new_instance['limit']);
        $instance['max_length'] = intval($new_instance['max_length']);
        $instance['max_excerpt_length'] = intval($new_instance['max_excerpt_length']);
        $instance['output_format'] = $new_instance['output_format'];
        $instance['post_type'] = intval($new_instance['post_type']);
        $instance['relative_time'] = ($new_instance['relative_time'] == '1') ? '1' : '0';
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['user_type'] = intval($new_instance['user_type']);
        return $instance;
    }
    
    public function form($instance) {
        $instance = wp_parse_args((array)$instance, $this->data);
        ?>
        <p>
            <label for="<?php echo($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo($this->get_field_id('title')); ?>" name="<?php echo($this->get_field_name('title')); ?>" type="text" value="<?php echo(esc_attr($instance['title'])); ?>" />
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('interval_length')); ?>"><?php _e('Count views no older than:', 'recently-popular') ?></label>
            <input id="<?php echo($this->get_field_id('interval_length')); ?>" name="<?php echo($this->get_field_name('interval_length')); ?>" type="text" size="3" value="<?php echo($instance['interval_length']); ?>" />
            <select id="<?php echo($this->get_field_id('interval_type')); ?>" name="<?php echo($this->get_field_name('interval_type')); ?>">
                <option value="HOUR" <?php selected($instance['interval_type'], 'HOUR'); ?>><?php _e('Hour(s)', 'recently-popular') ?></option>
                <option value="DAY" <?php selected($instance['interval_type'], 'DAY'); ?>><?php _e('Day(s)', 'recently-popular') ?></option>
                <option value="WEEK" <?php selected($instance['interval_type'], 'WEEK'); ?>><?php _e('Week(s)', 'recently-popular') ?></option>
                <option value="MONTH" <?php selected($instance['interval_type'], 'MONTH'); ?>><?php _e('Month(s)', 'recently-popular') ?></option>
                <option value="YEAR" <?php selected($instance['interval_type'], 'YEAR'); ?>><?php _e('Year(s)', 'recently-popular') ?></option>
            </select>
            <br/><input id="<?php echo($this->get_field_id('relative_time')); ?>" name="<?php echo($this->get_field_name('relative_time')); ?>" type="checkbox" value="1" <?php if ($instance['relative_time'] == '1') { echo 'checked="true"'; } ?>/>
            <label for="<?php echo($this->get_field_id('relative_time')); ?>"><?php _e('Use relative time?', 'recently-popular') ?></label>
            <br/><em><?php _e('Relative time changes the way "Count views no older than" works. For example, if you choose 1 month, normally this would cause all views for the past 30 days to be counted. With the relative time option it will count all view in the current month.', 'recently-popular') ?></em>
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('limit')); ?>"><?php _e('Limit to no more than:'); ?></label>
            <input id="<?php echo($this->get_field_id('limit')); ?>" name="<?php echo($this->get_field_name('limit')); ?>" type="text" size="3" value="<?php echo(esc_attr($instance['limit'])); ?>" /> posts
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('max_length')); ?>"><?php _e('Limit titles to:', 'recently-popular') ?></label>
            <input id="<?php echo($this->get_field_id('max_length')); ?>" name="<?php echo($this->get_field_name('max_length')); ?>" type="text" size="3" value="<?php echo(esc_attr($instance['max_length'])); ?>" /> <?php _e('characters (enter 0 for no limit)', 'recently-popular') ?>
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('max_excerpt_length')); ?>"><?php _e('Limit excerpts to:', 'recently-popular') ?></label>
            <input id="<?php echo($this->get_field_id('max_excerpt_length')); ?>" name="<?php echo($this->get_field_name('max_excerpt_length')); ?>" type="text" size="3" value="<?php echo(esc_attr($instance['max_excerpt_length'])); ?>" /> <?php _e('characters (enter 0 for no limit)', 'recently-popular') ?>
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('user_type')); ?>"><?php _e('Count views by:', 'recently-popular') ?></label>
            <select id="<?php echo($this->get_field_id('user_type')); ?>" name="<?php echo($this->get_field_name('user_type')); ?>">
                <option value="<?php echo(RecentlyPopularUserType::ALL);?>" <?php selected($instance['user_type'], RecentlyPopularUserType::ALL);?>><?php _e('Anonymous &amp; Registered Users', 'recently-popular') ?></option>
                <option value="<?php echo(RecentlyPopularUserType::ANONYMOUS);?>" <?php selected($instance['user_type'], RecentlyPopularUserType::ANONYMOUS);?>><?php _e('Anonymous Users Only', 'recently-popular') ?></option>
                <option value="<?php echo(RecentlyPopularUserType::REGISTERED);?>" <?php selected($instance['user_type'], RecentlyPopularUserType::REGISTERED);?>><?php _e('Registered Users Only', 'recently-popular') ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo($this->get_field_id('post_type')); ?>"><?php _e('Count views of:', 'recently-popular') ?></label>
            <select id="<?php echo($this->get_field_id('post_type')); ?>" name="<?php echo($this->get_field_name('post_type')); ?>">
                <option value="<?php echo(RecentlyPopularPostType::ALL);?>" <?php selected($instance['post_type'], RecentlyPopularPostType::ALL);?>><?php _e('Pages &amp; Posts', 'recently-popular') ?></option>
                <option value="<?php echo(RecentlyPopularPostType::PAGES);?>" <?php selected($instance['post_type'], RecentlyPopularPostType::PAGES);?>><?php _e('Pages Only', 'recently-popular') ?></option>
                <option value="<?php echo(RecentlyPopularPostType::POSTS);?>" <?php selected($instance['post_type'], RecentlyPopularPostType::POSTS);?>><?php _e('Posts Only', 'recently-popular') ?></option>
            </select>
        </p>
        <p>
            <a href="#" onclick="jQuery('#<?php echo($this->get_field_id('output_format')); ?>-formatting').toggle();return false;"><?php _e('Show/hide formatting options', 'recently-popular') ?></a><br/>
        </p>
        <div id="<?php echo($this->get_field_id('output_format')); ?>-formatting" style="display:none;">
            <p>
                <label for="<?php echo($this->get_field_id('output_format')); ?>"><?php _e('Format each result as:', 'recently-popular') ?></label>
                <input class="widefat" id="<?php echo($this->get_field_id('output_format')); ?>" name="<?php echo($this->get_field_name('output_format')); ?>" type="text" value="<?php echo(stripslashes(htmlentities($instance['output_format']))); ?>" />
                <?php _e('or choose a format below by clicking it:', 'recently-popular') ?><br/>
                <span style="cursor:pointer;" onclick="document.getElementById('<?php echo($this->get_field_id('output_format')); ?>').value='<a href=&quot;%post_url%&quot;>%post_title%</a>';"><u><?php _e('Post Name', 'recently-popular') ?></u></span><br/>
                <span style="cursor:pointer;" onclick="document.getElementById('<?php echo($this->get_field_id('output_format')); ?>').value='<a href=&quot;%post_url%&quot;>%post_title% (%hits%)</a>';"><u><?php _e('Post Name (Hits)', 'recently-popular') ?></u></span><br/>
                <span style="cursor:pointer;" onclick="document.getElementById('<?php echo($this->get_field_id('output_format')); ?>').value='<a href=&quot;%post_url%&quot;>%post_title%</a> <?php _e('by', 'recently-popular') ?> %display_name%';"><u><?php _e('Post Name', 'recently-popular') ?></u> <?php _e('by Author Name', 'recently-popular') ?></span><br/>
            </p>
            <p>
                <label for="<?php echo($this->get_field_id('default_thumbnail_url')); ?>"><?php _e('Default thumbnail URL:', 'recently-popular') ?></label>
                <input class="widefat" id="<?php echo($this->get_field_id('default_thumbnail_url')); ?>" name="<?php echo($this->get_field_name('default_thumbnail_url')); ?>" type="text" value="<?php echo(stripslashes(htmlentities($instance['default_thumbnail_url']))); ?>" />
            </p>
            <p>
                <label for="<?php echo($this->get_field_id('date_format')); ?>"><?php _e('Format dates as:', 'recently-popular') ?></label>
                <input id="<?php echo($this->get_field_id('date_format')); ?>" name="<?php echo($this->get_field_name('date_format')); ?>" type="text" size="10" value="<?php echo(stripslashes(htmlentities($instance['date_format']))); ?>" /> <a href="http://php.net/date" target="_blank"><?php _e('help', 'recently-popular') ?></a>
            </p>
            <div style="background-color:#f9f9f9;border:1px solid #000000;padding:3px;" id="<?php echo($this->get_field_id('output_format')); ?>-tag-help">
                <?php _e('Available tags:', 'recently-popular') ?><br/>
                <em>%categories%</em> - <?php _e('the post\'s categories', 'recently-popular') ?><br/>
                <em>%display_name%</em> - <?php _e('the post\'s author', 'recently-popular') ?><br/>
                <em>%hits%</em> - <?php _e('the number of qualifying views', 'recently-popular') ?><br/>
                <em>%post_title%</em> - <?php _e('the post\'s title', 'recently-popular') ?><br/>
                <em>%post_excerpt%</em> - <?php _e('the post\'s excerpt', 'recently-popular') ?><br/>
                <em>%post_url%</em> - <?php _e('the post\'s permalink', 'recently-popular') ?><br/>
                <em>%publish_date%</em> - <?php _e('the post\'s publish date', 'recently-popular') ?><br/>
                <em>%thumbnail_url%</em> - <?php _e('URL for the thumbnail', 'recently-popular') ?><br/>
                <em>%user_url%</em> - <?php _e('the post author\'s url', 'recently-popular') ?><br/>
            </div>
            <p>
            </p>
        </div>
        <p>
            <a href="#" onclick="jQuery('#<?php echo($this->get_field_id('categories')); ?>-formatting').toggle();return false;"><?php _e('Show/hide category options', 'recently-popular') ?></a><br/>
        </p>
        <div id="<?php echo($this->get_field_id('categories')); ?>-formatting" style="display:none;">
            <p>
                <em>*<?php _e('Note: Enabling category filtering will eliminate all posts with no category. If pages are selected in \'Count views of\' above then all pages will display since they can\'t have a category.', 'recently-popular') ?></em>
            </p>
            <p>
                <input id="<?php echo($this->get_field_id('enable_categories')); ?>" name="<?php echo($this->get_field_name('enable_categories')); ?>" type="checkbox" value="1" <?php if ($instance['enable_categories'] == '1') { echo 'checked="true"'; } ?>/>
                <label for="<?php echo($this->get_field_id('enable_categories')); ?>"><?php _e('Enable category filtering', 'recently-popular') ?></label>
            </p>
            <p>
                <label for="<?php echo($this->get_field_id('categories')); ?>"><?php _e('Choose only posts in these categories:', 'recently-popular') ?></label>
                <select id="<?php echo($this->get_field_id('categories')); ?>" name="<?php echo($this->get_field_name('categories')); ?>[]" class="widefat" style="height:100px;" multiple="multiple">
                    <?php
                        global $wpdb;
                        $sql = "SELECT t.`name`
                                FROM $wpdb->terms AS t
                                LEFT JOIN $wpdb->term_taxonomy AS tt ON t.`term_id` = tt.`term_id`
                                WHERE tt.`taxonomy` = 'category'
                                ORDER BY t.`name` DESC
                        ";

                        $categories = $wpdb->get_results($sql);
                        foreach ($categories as $category) {
                            $name = $category->name;
                            $selected = '';
                            if (strpos($instance['categories'], "'$name'") !== false) {
                                $selected = ' selected="selected"';
                            }
                            echo ("<option value=\"$name\"$selected>$name</option>");
                        }
                    ?>
                </select>
            </p>
        </div>
        <?php
    }
}

new RecentlyPopularWidget();
