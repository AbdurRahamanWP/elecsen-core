<?php

namespace QuaxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Quax_testimonials extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'quax_testimonial';
    }

    public function get_title()
    {
        return __('Quax Testimonials', 'elecsen-core');
    }

    public function get_icon()
    {
        return ' eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }

    public function get_style_depends()
    {
        return ['slick'];
    }

    public function get_script_depends()
    {
        return ['slick', 'quax-custom'];
    }

    protected function register_controls() {


        /** ====== Select Style ====== **/
        $this->start_controls_section(
            'select_style',
            [
                'label' => __('Style', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'style',
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


        //----------------------------------------- Testimonials List ---------------------------------------------//
        $this->start_controls_section(
            'testimonials_sec',
            [
                'label' => __('Content', 'elecsen-core'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'IRYNA PETRUNKO'
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'label' => __('Designation', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'author_image',
            [
                'label' => __('Author Image', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'contents',
            [
                'label' => __('Contents', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __('Testimonials', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ author_name }}}',
                'default' => [
                    [
                        'author_name'   => esc_html__('Ajanta Das', 'elecsen-core'),
                        'designation'   => esc_html__('WordPress Developer', 'elecsen-core'),
                        'contents' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo.',
                    ],
                    [
                        'author_name'   => esc_html__('Denis Robinson', 'elecsen-core'),
                        'designation'   => esc_html__('Ux Designer', 'elecsen-core'),
                        'contents' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo.',
                    ],
                ]
            ]
        );

        $this->end_controls_section();

       
        /**
         * Style Tabs ========================
         */
        /// -------------------------------------------- Style Author Name -----------------------------------------///
        $this->start_controls_section(
            'style_author_name',
            [
                'label' => __('Author Name', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_author .testimonial_author_meta h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_two_content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_name_typo',
                'selector' => '
                    {{WRAPPER}} .testimonial_author .testimonial_author_meta h2,
                    {{WRAPPER}} .testimonial_two_content h2
                ',
            ]
        );

        $this->end_controls_section();


        /// ------------------------------------------- Style Author Designation -----------------------------------///
        $this->start_controls_section(
            'style_designation',
            [
                'label' => __('Designation', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_author .testimonial_author_meta span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_two_content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typo',
                'selector' => '
                    {{WRAPPER}} .testimonial_author .testimonial_author_meta span,
                    {{WRAPPER}} .testimonial_two_content span
                ',
            ]
        );

        $this->end_controls_section();

        // Description Style ========================
        $this->start_controls_section(
            'style_desc',
            [
                'label' => __('Description', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '1'
                ]
            ]
        );

        $this->start_controls_tabs('desc_style_tabs');
        $this->start_controls_tab(
            'desc_style_normal',
            [
                'label' => esc_html__('Normal', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content .testimonial_desc p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_two_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'selector' => '
                    {{WRAPPER}} .testimonial_content .testimonial_desc p,
                    {{WRAPPER}} .testimonial_two_content p
                ',
            ]
        );

        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'description' => __('Padding around the testimonial items', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content .testimonial_desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial_two_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_background',
            [
                'label' => __('Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content .testimonial_desc' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_slider .item.slick-slide .testimonial_content .testimonial_desc:before' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_two_content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'desc_border',
                'label' => esc_html__('Border', 'elecsen-core'),
                'selector' => '
                    {{WRAPPER}} .testimonial_content .testimonial_desc,
                    {{WRAPPER}} .testimonial_two_content
                ',
            ]
        );
        $this->add_control(
            'desc_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content .testimonial_desc' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial_two_content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'desc_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '
                    {{WRAPPER}} .testimonial_content .testimonial_desc,
                    {{WRAPPER}} .testimonial_two_content
                ',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'desc_style_active',
            [
                'label' => esc_html__('Active', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'active_desc_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'active_desc_typo',
                'selector'  => '
                    {{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc p
                ',
            ]
        );

        $this->add_responsive_control(
            'active_desc_padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'description' => __('Padding around the testimonial items', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'active_desc_background',
            [
                'label' => __('Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc::before' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'active_desc_border',
                'label' => esc_html__('Border', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'active_desc_box_shadow',
                'label' => esc_html__('Box Shadow', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .testimonial_slider .item.slick-current .testimonial_content .testimonial_desc',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        $this->start_controls_section(
            'style_2_desc',
            [
                'label' => __('Description', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '2'
                ]
            ]
        );
        $this->add_control(
            's2_desc_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_two_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 's2_desc_typo',
                'selector' => '
                    {{WRAPPER}} .testimonial_two_content p
                ',
            ]
        );

        $this->add_responsive_control(
            's2_desc_padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'description' => __('Padding around the testimonial items', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_two_content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings();
        $testimonials = isset( $settings['testimonials'] ) ? $settings['testimonials'] : '';

        include 'testimonials/testimonial-' . $settings['style'] . '.php';
    }
}
