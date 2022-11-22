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
class Quax_image extends Widget_Base
{
    public function get_name()
    {
        return 'quax-image';
    }

    public function get_title()
    {
        return __('Quax Image', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-image';
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
            'section_image',
            [
                'label' => __('Image', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => esc_html__('Choose Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'feature_image_before',
            [
                'label' => esc_html__('Choose Before Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'feature_image_after',
            [
                'label' => esc_html__('Choose After Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'feature_image_shape',
            [
                'label' => esc_html__('Choose Shape Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();



        //Image Style =============================
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Image Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'feature_image_hp',
            [
                'label' => esc_html__('Horizontal Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_image_vp',
            [
                'label' => esc_html__('Vertical Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .feature_image',
            ]
        );

        $this->end_controls_section();

        // Before Image Style =================================
        $this->start_controls_section(
            'before_image_style',
            [
                'label' => __('Before Image Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'horizontal_position',
            [
                'label' => esc_html__('Horizontal Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_before' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'vertical_position',
            [
                'label' => esc_html__('Vertical Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_before' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'before_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'before_image_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .feature_image_before',
            ]
        );

        $this->end_controls_section();

        // After Image Style =================================
        $this->start_controls_section(
            'after_image_style',
            [
                'label' => __('After Image Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'after_image_hp',
            [
                'label' => esc_html__('Horizontal Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_after' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'after_image_vp',
            [
                'label' => esc_html__('Vertical Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_after' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'after_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'after_image_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .feature_image_after',
            ]
        );
        $this->end_controls_section();

        // Shape Image Style =================================
        $this->start_controls_section(
            'shape_image_style',
            [
                'label' => __('Shape Image Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'shape_image_hp',
            [
                'label' => esc_html__('Horizontal Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_shape' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'shape_image_vp',
            [
                'label' => esc_html__('Vertical Position', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_shape' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'shape_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .feature_image_shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'shape_image_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .feature_image_shape',
            ]
        );
        $this->end_controls_section();



        // Section Style ==========================
        $this->start_controls_section(
            'image_section_style',
            [
                'label' => __('Section Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'img_sec_height',
            [
                'label' => esc_html__('Section Height', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 400,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image_wrapper.position-relative' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__('Padding', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background',
                'label' => esc_html__('Background', 'elecsen-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .quax_image',
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings); ?>

        <div class="image_wrapper position-relative">
            <?php
            if (!empty($feature_image_shape)) {
                echo wp_get_attachment_image($feature_image_shape['id'], 'full', '', array('class' => 'feature_image_shape'));
            }
            
            if (!empty($feature_image_after)) {
                echo wp_get_attachment_image($feature_image_after['id'], 'full', '', array('class' => 'feature_image_after'));
            }

            if (!empty($feature_image)) {
                echo wp_get_attachment_image($feature_image['id'], 'full', '', array('class' => 'feature_image'));
            }

            if (!empty($feature_image_before)) {
                echo wp_get_attachment_image($feature_image_before['id'], 'full', '', array('class' => 'feature_image_before'));
            }
            ?>
        </div>

<?php
    }
}
