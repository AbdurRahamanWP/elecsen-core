<?php

namespace QuaxCore\Widgets;

defined('ABSPATH') || exit; // Abort, if called directly.

use Elementor\{
    Group_Control_Box_Shadow,
    Utils,
    Widget_Base,
    Controls_Manager,
    Group_Control_Typography,
    Group_Control_Background
};

class Quax_Heading extends Widget_Base
{

    public function get_name()
    {
        return 'quax-heading';
    }

    public function get_title()
    {
        return esc_html__('Quax Heading', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('heading_section', [
            'label' => esc_html__('Heading', 'elecsen-core'),
        ]);
        $this->add_control('heading', [
            'label'       => esc_html__('Heading Text', 'elecsen-core'),
            'type'        => Controls_Manager::TEXTAREA,
            'description' => esc_html__('Use <span>tag</span> for text gradient color ', 'elecsen-core'),
            'label_block' => true,
            'default'     => '<span>Discover</span> all Our Web Hosting Features',

        ]);
        $this->add_control(
            'heading_tag',
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
            'heading_align',
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
                    '{{WRAPPER}} .quax_heading_wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();



        //Title Style Section
        //=========================
        $this->start_controls_section('section_title_style', [
            'label' => esc_html__('Title', 'elecsen-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('title_color_one', [
            'label'     => esc_html__('Title color', 'elecsen-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .quax_heading_wrapper .quax_heading' => 'color: {{VALUE}};'
            ],
        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name'     => 'title_typography',
            'selector' => '{{WRAPPER}} .quax_heading_wrapper .quax_heading',
        ]);

        $this->end_controls_section();

        // Marked text Style
        $this->start_controls_section('mark_text_sec', [
            'label' => esc_html__('Style Marked Text', 'elecsen-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name'     => 'marked_text_typography',
            'label'    => __('Marked Text Typography', 'elecsen-core'),
            'selector' => '{{WRAPPER}} .quax_heading_wrapper .quax_heading span',
        ]);

        $this->add_control('marked_color', [
            'label'     => esc_html__('Color', 'elecsen-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .quax_heading_wrapper .quax_heading span' => 'color: {{VALUE}};',
            ]
        ]);

       

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);
?>
        <div class="quax_heading_wrapper">
            <?php
            echo '<' . $heading_tag . ' class="quax_heading">' . quax_kses_post(nl2br($heading)) . '</' . $heading_tag . '>';
            ?>

        </div>

<?php
    }
}
