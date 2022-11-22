<?php

namespace QuaxCore\Widgets;

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\{
    Group_Control_Background,
    Group_Control_Box_Shadow,
    Widget_Base,
    Controls_Manager,
    Group_Control_Typography,
    Group_Control_Border
};


class Quax_video extends Widget_Base
{

    public function get_name()
    {
        return 'quax-video';
    }

    public function get_title()
    {
        return __('Quax Video', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-play';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }
    
    public function get_style_depends()
    {
        return ['magnific-popup'];
        
    }
    public function get_script_depends()
    {
        return ['magnific-popup'];    
    }


    protected function register_controls()
    {

        $this->start_controls_section('quax_video_section', [
            'label' => __('Video', 'elecsen-core'),
        ]);

        $this->add_control('video_url', [
            'label'       => __('Video URL', 'elecsen-core'),
            'type'        => Controls_Manager::TEXT,
            'default'      => ''
        ]);

        $this->add_control('poster_img', [
            'label'       => __('Poster Image', 'elecsen-core'),
            'type'        => Controls_Manager::MEDIA,
        ]);

        $this->add_control('video_play_icon', [
            'label'   => __('Icon', 'elecsen-core'),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => 'fa-solid fa-play',
                'library' => 'solid',
            ],
        ]);
        $this->add_control('video_duration', [
            'label'       => __('Video Duration Text', 'elecsen-core'),
            'type'        => Controls_Manager::TEXT,
            'default'      => 'Duration 3:29'
        ]);

        $this->end_controls_section();


        


        $this->start_controls_section('style_section', [
            'label' => __('Section Background', 'elecsen-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]);
        $this->add_responsive_control(
            'section_margin',
            [
                'label' => esc_html__('Margin', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_video_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Padding', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quax_video_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'sec_background',
                'label' => esc_html__('Background', 'plugin-name'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .quax_video_box',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings); ?>

        <div class="quax_video_box position-relative overflow-hidden">
            <?php
            if (!empty($poster_img['id'])) {
                echo wp_get_attachment_image($poster_img['id'], 'full');
            }
            if (!empty($video_url)) {
                echo '<div class="video_meta">';
                    echo '<a href="' . esc_url($video_url) . '" class="quax-video-popup">';
                    \Elementor\Icons_Manager::render_icon($video_play_icon, ['aria-hidden' => 'true']);
                    echo '</a>';
                
                    echo '<span>'. esc_html( $video_duration ) .'</span>';
                echo '</div>';
            }
            ?>

        </div>

<?php
    }
}
