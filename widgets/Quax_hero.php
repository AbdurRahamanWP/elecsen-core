<?php

namespace QuaxCore\Widgets;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Text_Shadow;
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
 * Class Heading
 * @package QuaxCore\Widgets
 */
class Quax_hero extends Widget_Base
{
    public function get_name()
    {
        return 'quax-hero';
    }

    public function get_title()
    {
        return __('Quax Hero', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-banner';
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
            'hero_sec_style',
            [
                'label' => __('Hero Style', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'hero_style',
            [
                'label' => __('Select Style', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 01', 'elecsen-core'),
                    'style_2' => __('Style 02', 'elecsen-core'),
                ],
                'default' => 'style_1',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __('Title', 'elecsen-core'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'elecsen-core'),
                'default' => __('Add Your Heading Text Here', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('HTML Tag', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h2',
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label' => __('Alignment', 'elecsen-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elecsen-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'elecsen-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'elecsen-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'elecsen-core'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_content_section',
            [
                'label' => __('Content', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'hero_content',
            [
                'label' => esc_html__('Description', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default description', 'elecsen-core'),
                'placeholder' => esc_html__('Type your description here', 'elecsen-core'),
            ]
        );
        $this->end_controls_section();

        // Button Settings ================================
        $this->start_controls_section(
            'hero_button_section',
            [
                'label' => __('Button', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'hero_button_label',
            [
                'label' => esc_html__('Button Label', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Purches Now', 'elecsen-core')
            ]
        );
        $this->add_control(
            'hero_button_url',
            [
                'label' => esc_html__('Button URL', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Short Description Settings ================================
        $this->start_controls_section(
            'short_desc_and_people',
            [
                'label' => __('Short Description', 'elecsen-core'),
                'condition' => [
                    'hero_style' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'short_desc',
            [
                'label' => esc_html__('Description', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Join over 100+ real people who have worked with us', 'elecsen-core')
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'buyer_image',
            [
                'label' => __('Buyer Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'buyers',
            [
                'label' => __('Buyer', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ buyer_image.alt }}}',
            ]
        );
        $this->add_control(
            'enquire_us',
            [
                'label'     => esc_html__('Enquire Us', 'elecsen-core'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__('Enquire Us', 'elecsen-core'),
                'label_block' => true,
                'separator' => 'before'
            ]
        );
        $this->add_control(
            'enquire_us_url',
            [
                'label' => esc_html__('Enquire Us URL', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        // Feature Image Settings ================================
        $this->start_controls_section(
            'hero_feature_img_section',
            [
                'label' => __('Feature Image', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'hero_feature_img',
            [
                'label' => esc_html__('Choose Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();





        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .quax_hero_title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .quax_hero_title',
            ]
        );
        $this->end_controls_section();

        // Description Style ==========================
        $this->start_controls_section(
            'section_desc_style',
            [
                'label' => __('Description', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .hero_desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __('Description Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero_desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .hero_desc',
            ]
        );

        $this->end_controls_section();

        //Button Style =============================
        $this->start_controls_section(
            'hero_section_button',
            [
                'label' => __('Button Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'hero_btn_typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .quax_hero_button',
            ]
        );
        $this->add_responsive_control(
            'hero_btn_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hero_btn_padding',
            [
                'label' => esc_html__('Padding', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('button_style_tabs');
        $this->start_controls_tab(
            'button_style_normal',
            [
                'label' => esc_html__('Normal', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'hero_btn_color',
            [
                'label' => __('Button Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hero_btn_bg',
            [
                'label' => __('Button Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'hero_btn_border',
                'label' => esc_html__('Border', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .quax_hero_button',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hero_btn_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .quax_hero_button',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover',
            [
                'label' => esc_html__('Hover', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'hero_btn_color_hover',
            [
                'label' => __('Button Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hero_btn_bg_hover',
            [
                'label' => __('Button Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_hero_button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'hero_btn_border_hover',
                'label' => esc_html__('Border', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .quax_hero_button:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hero_btn_box_shadow_hover',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .quax_hero_button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Section Style ==========================
        $this->start_controls_section(
            'hero_short_desc_style',
            [
                'label' => __('Short Description Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'short_desc_color',
            [
                'label' => __('Short Description Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_hero .hero_desc_2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'short_desc_typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .quax_hero .hero_desc_2',
            ]
        );
        $this->add_control(
            'short_desc_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero .hero_desc_2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'enquire_style',
            [
                'label' => esc_html__('Enquire Style', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'enquire_btn_color',
            [
                'label' => __('Enquire Button Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .buyer_img_and_enquire .enquire_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'enquire_btn_typography',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .buyer_img_and_enquire .enquire_btn',
            ]
        );
        $this->add_control(
            'enquire_btn_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .buyer_img_and_enquire .enquire_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after'
            ]
        );
        $this->end_controls_section();


        // Section Style ==========================
        $this->start_controls_section(
            'hero_section_style',
            [
                'label' => __('Section Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'hero_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_padding',
            [
                'label' => esc_html__('Padding', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'hero_background',
                'label' => esc_html__('Background', 'elecsen-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .quax_hero',
            ]
        );


        $this->add_control(
            'hero_content_vertical_align',
            [
                'label' => esc_html__('Vertical Align', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'   => esc_html__('None', 'elecsen-core'),
                    'start'  => esc_html__('Top', 'elecsen-core'),
                    'center' => esc_html__('Middle', 'elecsen-core'),
                    'end'    => esc_html__('Bottom', 'elecsen-core'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render heading widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);
        $content_align = isset($hero_content_vertical_align) ? 'align-items-' . $hero_content_vertical_align : '';
        $hero_class = $hero_style == 'style_1' ? 'quax_hero_1' : 'quax_hero_2';
        ?>

        <section class="quax_hero <?php echo esc_attr($hero_class )?>">
            <span class="animated_layer_1"></span>
            <span class="animated_layer_2"></span>
            <span class="animated_layer_3"></span>
            <span class="animated_layer_4"></span>
            <span class="animated_layer_5" data-parallax='{"x": 50, "y": 50}'></span>
            <span class="animated_layer_6" data-parallax='{"x": 50, "y": 50}'></span>
            <span class="animated_layer_7" data-parallax='{"x": 0, "y": 50}'><img src="<?php echo esc_url(QUAX_CORE_IMAGES . 'hero-deco-1.png') ?>" alt="<?php echo esc_attr__('Quax hero decoration', 'elecsen-core') ?>"></span>
            <span class="animated_layer_8" data-parallax='{"x": 0, "y": 90}'><img src="<?php echo esc_url(QUAX_CORE_IMAGES . 'hero-deco-2.png') ?>" alt="<?php echo esc_attr__('Quax hero decoration', 'elecsen-core') ?>"></span>
            <div class="container">
                <div class="row <?php echo esc_attr($content_align) ?> quax_hero_row">
                    <div class="col-lg-7 col-12 col-md-6">
                        <?php
                        if (!empty($hero_title)) {
                            echo '<' . $title_tag . ' class="quax_hero_title">' . wp_kses_post(nl2br($hero_title)) . '</' . $title_tag . '>';
                        }
                        if (!empty($hero_content)) {
                            echo '<div class="hero_desc">' . wp_kses_post($hero_content) . '</div>';
                        }
                        if (!empty($hero_button_label)) {
                            echo '<a href="' . esc_url($hero_button_url['url']) . '" class="quax_hero_button">' . esc_html($hero_button_label) . '</a>';
                        }

                        if ($hero_style == 'style_2') {

                            if (!empty($short_desc)) {
                                echo '<p class="hero_desc_2">' . esc_html($short_desc) . '</p>';
                            }
                            echo '<div class="buyer_img_and_enquire">';
                            if (is_array($buyers) && !empty($buyers)) {
                                echo '<div class="buyer_images">';
                                foreach ($buyers as $buyer) {
                                    echo wp_get_attachment_image($buyer['buyer_image']['id'], 'full');
                                }
                                echo '</div>';
                            }

                            if (!empty($enquire_us)) {
                                echo '<a href="' . esc_url($enquire_us_url['url']) . '" class="enquire_btn">' . esc_html($enquire_us) . '</a>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="col-lg-5 col-12 col-md-6">
                        <?php
                        if (!empty($hero_feature_img)) {
                            echo wp_get_attachment_image($hero_feature_img['id'], 'full', '', array('class' => 'hero_feature_image'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}