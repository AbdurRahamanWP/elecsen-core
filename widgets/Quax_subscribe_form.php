<?php

namespace QuaxCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



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
class Quax_subscribe_form extends Widget_Base
{

    public function get_name()
    {
        return 'quax_subscribe_form';
    }

    public function get_title()
    {
        return __('Subscribe form', 'elecsen-core');
    }

    public function get_icon()
    {
        return ' eicon-mailchimp';
    }

    public function get_categories()
    {
        return ['quax-elements'];
    }

    public function get_keywords()
    {
        return ['mailchimp', 'form'];
    }

    public function get_script_depends()
    {
        return ['ajax-chimp'];
    }


    protected function register_controls()
    {


        // ------------------------------ MailChimp form ------------------------------
        $this->start_controls_section(
            'form_settings',
            [
                'label' => __('Form settings', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'email_placeholder',
            [
                'label' => esc_html__('Email Filed Placeholder', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Type your email...',
            ]
        );

        $this->add_control(
            'action_url',
            [
                'label' => esc_html__('Action URL', 'elecsen-core'),
                'description' => __('Enter here your MailChimp action URL. <a href="https://goo.gl/k5a2tA" target="_blank"> How to </a>', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__('Submit Button', 'elecsen-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Subscribe',
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Form Styling -----------------------------
         */
        $this->start_controls_section(
            'form_style_sec',
            [
                'label' => __('Form Styling', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '1'
                ]
            ]
        );

        $this->add_control(
            'form_border_color',
            [
                'label' => __('Border Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .f_subscribe .form-control' => 'border-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'form_submit_btn_color',
            [
                'label' => __('Submit Button Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .f_subscribe button' => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_submit_btn_typo',
                'selector' => '{{WRAPPER}} .team_member .team_title_designation h2',
            ]
        );


        $this->end_controls_section();


        // ------------------- Button ---------------------- //
        $this->start_controls_section(
            'btn_style',
            [
                'label' => __('Button', 'elecsen-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        //----------------- Normal-----------------------//
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => __('Normal', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html__('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Border Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        // ------------------ Hover ------------------------//
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => __('Hover', 'elecsen-core'),
            ]
        );

        $this->add_control(
            'btn_text_color_hover',
            [
                'label' => esc_html__('Text Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color_hover',
            [
                'label' => esc_html__('Background Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color_hover',
            [
                'label' => esc_html__('Border Color', 'elecsen-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_responsive_control(
            'subscribe_btn_padding',
            [
                'label' => __('Padding', 'elecsen-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} form.quax_subscribe.mailchimp .input_wrapper .btn-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn-in-form.mailchimp button[type=submit]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $btn_label = !empty($settings['btn_label']) ? $settings['btn_label'] : '';
        $email_placeholder = !empty($settings['email_placeholder']) ? $settings['email_placeholder'] : ''; ?>
        
        <form action="#" class="quax_subscribe mailchimp" method="post">
            <div class="input_wrapper">
                <div class="input_with_icon">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="EMAIL" class="form-control memail" placeholder="<?php echo esc_html($email_placeholder); ?>">
                </div>
                <?php if ($btn_label) { ?>
                    <button class="btn btn-submit" type="submit">
                        <?php echo esc_html($btn_label); ?>
                    </button>
                <?php } ?>
            </div>
            <p class="mchimp-errmessage" style="display: none;"></p>
            <p class="mchimp-sucmessage" style="display: none;"></p>
        </form>

        <script>
            ;
            (function($) {
                "use strict";
                $(document).ready(function() {
                    // MAILCHIMP
                    if ($(".mailchimp").length > 0) {
                        $(".mailchimp").ajaxChimp({
                            callback: mailchimpCallback,
                            url: "<?php echo esc_js($settings['action_url']) ?>"
                        });
                    }
                    $(".memail").on("focus", function() {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function() {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function() {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(500);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery);
        </script>
<?php
    }
}
