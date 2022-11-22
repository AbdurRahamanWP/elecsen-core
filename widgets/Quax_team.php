<?php

namespace QuaxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use WP_Query;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Team
 * @package quaxCore\Widgets
 */
class Quax_team extends Widget_Base
{
    public function get_name()
    {
        return 'quax_team';
    }

    public function get_title()
    {
        return __('Quax Team', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
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
            'section_team',
            [
                'label' => __('Team', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'show_count',
            [
                'label' => esc_html__('Show Posts Count', 'elecsen-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 4
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC'
                ],
                'default' => 'DESC'
            ]
        );
       
        $this->end_controls_section();

        /**
         * Team Style
         */
        $this->start_controls_section(
            'style_title',
            [
                'label' => __('Team Style', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'selector' => '{{WRAPPER}} .team_member .team_title_designation h2',
            ]
        );
        
        $this->add_control(
            'designation_color',
            [
                'label' => __('Designation Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation span' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typo',
                'selector' => '{{WRAPPER}} .team_member .team_title_designation span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'team_content',
            [
                'label' => __('Team Content', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'team_content_align',
			[
				'label' => esc_html__( 'Alignment', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'plugin-name' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'plugin-name' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'plugin-name' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation' => 'text-align: {{VALUE}};',
                ],
			]
		);
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'selector' => '{{WRAPPER}} .team_member',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .team_member' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .team_member img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;',
                    '{{WRAPPER}} .team_member .team_title_designation' => 'border-radius: 0 0 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'team_box_shadow',
                'selector' => '{{WRAPPER}} .team_member',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_bg',
            [
                'label' => __('Content Background', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_member .team_title_designation' => 'background: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();
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
        extract( $settings ); 
        
        $args = array(
            'post_type'     => 'team',
            'posts_per_page'=> $show_count,
            'order'         => $order,
            'post_status'   => 'publish'
        );
        $team_query = new WP_Query( $args );
        ?>

        <section class="quax_team_wrapper">
            <div class="container">
                <div class="row">
                    <?php 
                    if( $team_query->have_posts() ){
                        while( $team_query->have_posts() ){
                            $team_query->the_post(); ?>

                                <div class="col-10 col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                    <div class="team_member">
                                        <?php 
                                        $designation= function_exists( 'get_field' ) ? get_field( 'member_designation' ) : '';
                                        $facebook   = function_exists( 'get_field' ) ? get_field( 'member_facebook' ) : '';
                                        $twitter    = function_exists( 'get_field' ) ? get_field( 'member_twitter' ) : '';
                                        $linkedin   = function_exists( 'get_field' ) ? get_field( 'member_linkedin' ) : '';
                                        $instagram  = function_exists( 'get_field' ) ? get_field( 'member_instagram' ) : '';

                                        the_post_thumbnail('quax_360x300');
                                        echo '<div class="team_title_designation">';
                                            echo '<a href="'. get_the_permalink() .'"><h2>'. get_the_title() .'</h2></a>';
                                            
                                            if( !empty( $designation ) ){
                                                echo '<span>'. esc_html( $designation ) .'</span>';
                                            }
                                        echo '</div>'; ?>

                                        <ul class="member_social_profile">
                                            <?php 
                                            if( $facebook ){
                                                echo '<li><a href="'. esc_url( $facebook ) .'"><i class="fab fa-facebook-f"></i></a></li>';
                                            }
                                            if( $twitter ){
                                                echo '<li><a href="'. esc_url( $twitter ) .'"><i class="fab fa-twitter"></i></a></li>';
                                            }
                                            if( $linkedin ){
                                                echo '<li><a href="'. esc_url( $linkedin ) .'"><i class="fab fa-linkedin-in"></i></a></li>';
                                            }
                                            if( $instagram ){
                                                echo '<li><a href="'. esc_url( $instagram ) .'"><i class="fab fa-instagram"></i></a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    
                </div>
            </div>
        </section>

        <?php
    }
}