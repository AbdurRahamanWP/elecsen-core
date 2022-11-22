<?php

namespace QuaxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use WP_Query;



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
class Quax_Portfolio extends Widget_Base
{

    public function get_name()
    {
        return 'quax_portfolio';
    }

    public function get_title()
    {
        return __('Quax Portfolio', 'elecsen-core');
    }

    public function get_icon()
    {
        return ' eicon-post';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style Section', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('portfolio Style', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('Box Grid', 'elecsen-core'),
                    '2' => esc_html__('Stripe Row', 'elecsen-core'),
                ],
                'default' => '1'
            ]
        );

        $this->end_controls_section();

        // ---------------------------------- Filter Options ------------------------
        $this->start_controls_section(
            'filter',
            [
                'label' => __('Filter', 'elecsen-core'),
            ]
        );
        $this->add_control(
            'select_portfolio_catagory',
            [
                'label' => __('Display by Catagory?', 'elecsen-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elecsen-core'),
                'label_off' => __('No', 'elecsen-core'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );


        $this->add_control(
            'title_html_tag',
            [
                'label' => __('Title HTML Tag', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                ],
                'default' => 'h4',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'limit_title_char',
            [
                'label' => esc_html__('Title Length', 'elecsen-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20
            ]
        );
        $this->add_control(
            'limit_content_char',
            [
                'label' => esc_html__('Content Length', 'elecsen-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 80
            ]
        );
        $this->add_control(
            'show_count',
            [
                'label' => esc_html__('Show Posts Count', 'elecsen-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3
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
                'default' => 'ASC'
            ]
        );

        $this->add_control(
            'btn_title',
            [
                'label' => __('Read More Button', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More'
            ]
        );

        $this->end_controls_section();


        // -------------------------------------- Column Grid Section ---------------------------------//
        $this->start_controls_section(
            'column_sec',
            [
                'label' => __('Grid Column', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'column',
            [
                'label' => __('Grid Column', 'elecsen-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '6' => __('Two column', 'elecsen-core'),
                    '4' => __('Three column', 'elecsen-core'),
                    '3' => __('Four column', 'elecsen-core'),
                ],
                'default' => '4'
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'portfolio_item_style',
            [
                'label' => __('Content Style', 'elecsen-core'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
            'portfolio_title_color',
            [
                'label' => __('Title Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_portfolio_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_title_typography',
                'label' => __('Typography', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .quax_portfolio_title',
            ]
        );

        $this->add_control(
            'portfolio_desc_color',
            [
                'label' => __('Description Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_content p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_desc_typography',
                'label' => __('Typography', 'elecsen-core'),
                'selector' => '{{WRAPPER}} .portfolio_content p',
            ]
        );
        $this->end_controls_section();


        // -------------------------------------- Accent Color  ---------------------------------//
        $this->start_controls_section(
            'accent_color_sec',
            [
                'label' => __('Accent Color', 'elecsen-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        //---------------------------- Normal and Hover ---------------------------//
        $this->start_controls_tabs(
            'accent_style_tabs'

        );

        /************************** Normal Color *****************************/
        $this->start_controls_tab(
            'accent_normal',
            [
                'label' => __('Normal', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'accent_normal_font_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_portfolio_item a.read_btn, {{WRAPPER}} .quax_portfolio_item span.quax_post_category i, {{WRAPPER}} .quax_portfolio_item .quax_post_meta i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        //**************************** Hover Color *****************************//
        $this->start_controls_tab(
            'accent_hover_style',
            [
                'label' => __('Hover', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'accent_hover_font_color',
            [
                'label' => __('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quax_portfolio_item a.read_btn:hover, {{WRAPPER}} .quax_portfolio_item span.quax_post_category:hover i, {{WRAPPER}} .quax_portfolio_item .quax_post_meta:hover i' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // -------------------------------------- Column Grid Section ---------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => __('Style Background', 'elecsen-core'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'sec_bg_color',
            [
                'label' => __('Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h_portfolio_area' => 'background: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .h_portfolio_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();

        $arrs = array(
            'post_type'     => 'portfolio',
            'posts_per_page' => $settings['show_count'],
            'order' => $settings['order'],
        );

        $portfolio_post = new WP_Query($arrs);

        $title_tag = !empty($settings['title_html_tag']) ? $settings['title_html_tag'] : 'h2';
        $read_more = !empty($settings['btn_title']) ? $settings['btn_title'] : esc_html__('Read More', 'elecsen-core');

?>
        <div class="row justify-content-center quax_portfolio_post">
            <?php
            while ($portfolio_post->have_posts()) : $portfolio_post->the_post();
            ?>
                <div class="col-lg-<?php echo esc_attr($settings['column']) ?> col-md-6 col-sm-6">
                    <div class="quax_portfolio_item">
                        <div class="portfolio_thumbnail">
                            <?php the_post_thumbnail('quax_370x250'); ?>
                            <div class="quax_post_meta">
                                <span class="quax_user_name"><i class="fa-regular fa-circle-user"></i>By <?php echo get_the_author_meta('nicename', get_the_author_meta('ID')); ?></span>
                                <span class="quax_post_category"><i class="far fa-folder"></i>
                                    <?php quax_taxonomy_terms(); ?> </span>
                            </div>
                        </div>

                        <div class="portfolio_content">
                            <a href="<?php the_permalink() ?>">
                                <?php echo '<' . $title_tag . ' class="quax_portfolio_title">' . quax_get_limit_char(get_the_title(), $settings['limit_title_char'], '') . '</' . $title_tag . '>'; ?>
                            </a>
                            <?php echo wpautop(quax_get_limit_char(get_the_content(), $settings['limit_content_char'], ''));

                            if (!empty($read_more)) { ?>
                                <a href="<?php the_permalink() ?>" class="read_btn"><?php echo esc_html($read_more) ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
<?php

    }
}
