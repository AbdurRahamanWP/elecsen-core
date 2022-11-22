<?php

namespace QuaxCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Button
 * @package quaxCore\Widgets
 */
class Quax_tabs extends Widget_Base
{
    public function get_name()
    {
        return 'quax_tabs';
    }

    public function get_title()
    {
        return __('Quax Tabs', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-tabs';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }

    public function get_keywords()
    {
        return ['icon'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'tab_style_sec',
            [
                'label' => __('Tabs Style', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'tab_style',
            [
                'label' => __('Style', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1'  => __('Style 01', 'elecsen-core'),
                    '2'  => __('Style 02', 'elecsen-core'),
                ],
                'default' => '1',
            ]
        );
        $this->end_controls_section();

        //============================ Tabs ===========================//
        $this->start_controls_section(
            'tabs_sec',
            [
                'label' => __('Tabs', 'elecsen-core'),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'tab_title',
            [
                'label' => __('Title', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Idea & Concept'
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-edit',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'tab_content',
            [
                'label' => __('Content', 'elecsen-core'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Lorem ipsum dolor sit amet, consectetur...'
            ]
        );
        $repeater->add_control(
            'tab_image',
            [
                'label' => esc_html__('Choose Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  QUAX_CORE_IMAGES . 'tab-feature-image.jpg',
                ],
            ]
        );
        $repeater->add_control(
            'btn_label',
            [
                'label' => __('Button Label', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View More'
            ]
        );
        $repeater->add_control(
            'btn_url',
            [
                'label' => __('Button URL', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '#'
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __('Tab Items', 'elecsen-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_title }}}',
                'default' => [
                    [
                        'tab_title' => esc_html__('Idea & Concept', 'elecsen-core'),
                        'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur...', 'elecsen-core'),
                    ],
                    [
                        'tab_title' => esc_html__('Infrastructure Plan', 'elecsen-core'),
                        'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur...', 'elecsen-core'),
                    ]
                ],
            ]
        );

        $this->end_controls_section(); //End Tabs
    }

    /**
     * Render icon widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings();
        $sec_unique_id = $this->get_id();
        extract($settings);

        if ($tab_style == '1') { ?>
            <section class="quax_tab">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <?php
                                if (is_array($tabs)) {
                                    $i = 1;
                                    foreach ($tabs as $tab) {
                                        $active = $i == 1 ? 'active' : '';
                                        $aria_controls = str_replace(' ', '-', $tab['tab_title']); ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo esc_attr($active) ?>" data-bs-toggle="pill" data-bs-target="#tab_<?php echo esc_attr($sec_unique_id) . '_' . esc_attr($i++); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($aria_controls) ?>" aria-selected="true">
                                                <i class="<?php echo esc_attr($tab['icon']['value']) ?>"></i>
                                                <?php echo esc_html($tab['tab_title']) ?>
                                            </button>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content quax_tab_content">
                                <?php
                                if (is_array($tabs)) {
                                    $i = 1;
                                    foreach ($tabs as $tab) {
                                        $show_active = $i == 1 ? 'show active' : '';
                                ?>
                                        <div class="tab-pane fade <?php echo esc_attr($show_active) ?>" id="tab_<?php echo esc_attr($sec_unique_id) . '_' . esc_attr($i++); ?>" role="tabpanel">
                                            <div class="tab_feature_img">
                                                <?php echo '<img src="' . esc_url($tab['tab_image']['url']) . '" alt="' . esc_attr($tab['tab_title']) . '" />'; ?>
                                            </div>
                                            <div class="tab_desc">
                                                <div class="tab_title">
                                                    <h2><?php echo esc_html($tab['tab_title']) ?></h2>
                                                    <?php echo quax_kses_post($tab['tab_content']) ?>
                                                </div>
                                                <div class="tab_btn">
                                                    <?php echo '<a href="' . esc_url($tab['btn_url']) . '">' . esc_html($tab['btn_label']) . '</a>' ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        } else { ?>
            <section class="quax_tab_2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab_cat">
                                <ul class="nav nav-pills" role="tablist">
                                    <?php
                                    if (is_array($tabs)) {
                                        $i = 1;
                                        foreach ($tabs as $tab) {
                                            $active = $i == 1 ? 'active' : '';
                                            $aria_controls = str_replace(' ', '-', $tab['tab_title']);
                                    ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link <?php echo esc_attr($active) ?>" data-bs-toggle="pill" data-bs-target="#tab_<?php echo esc_attr($sec_unique_id) . '_' . esc_attr($i++); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($aria_controls) ?>" aria-selected="true">
                                                    <i class="<?php echo esc_attr($tab['icon']['value']) ?>"></i>
                                                    <?php echo esc_html($tab['tab_title']) ?>
                                                </button>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="tab-content quax_tab_content_2">
                                <?php
                                if (is_array($tabs)) {
                                    $i = 1;
                                    foreach ($tabs as $tab) {
                                        $show_active = $i == 1 ? 'show active' : '';
                                ?>
                                        <div class="tab-pane fade <?php echo esc_attr($show_active) ?>" id="tab_<?php echo esc_attr($sec_unique_id) . '_' . esc_attr($i++); ?>" role="tabpanel">
                                            <div class="tab_widget_content_wrap">
                                                <div class="tab_feature_img">
                                                    <?php echo '<img src="' . esc_url($tab['tab_image']['url']) . '" alt="' . esc_attr($tab['tab_title']) . '" />'; ?>
                                                </div>
                                                <div class="tab_desc">
                                                    <?php
                                                    echo wpautop(quax_kses_post($tab['tab_content']));
                                                    echo '<a href="' . esc_url($tab['btn_url']) . '" class="tab_2_btn">' . esc_html($tab['btn_label']) . '</a>';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
<?php
        }
    }
}
