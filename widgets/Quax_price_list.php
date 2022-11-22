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
class Quax_price_list extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'quax_price_list';
    }

    public function get_title()
    {
        return __('Quax Price', 'elecsen-core');
    }

    public function get_icon()
    {
        return 'eicon-device-mobile';
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
		//====Content Section

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'elecsen-core' ),
			]
		);
		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 300,
				'step' => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'time',
			[
				'label' => esc_html__( 'Time For Price', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'elecsen-core' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Description', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'elecsen-core' ),
			]
		);

		//=====Start Repeter

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
		$repeater->add_control(
			'icon_title', [
				'label' => esc_html__( 'Title', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'elecsen-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => esc_html__( 'fas fa-facebook',  ),
						'icon_title' => esc_html__( 'Type Your Title',  ),
					],
					[
						'icon' => esc_html__( 'fas fa-facebook',  ),
						'icon_title' => esc_html__( 'Type Your Title', ),
					],
					
				],
				'title_field' => '{{{ icon }}}',
			]
		);
		//---End Repeter


		$this->add_control(
			'btn_title',
			[
				'label' => esc_html__( 'Button Title', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'elecsen-core' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Link', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elecsen-core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);


		$this->end_controls_section();

		//=====Start Style Section

		$this->start_controls_section(
			'body_section',
			[
				'label' => esc_html__( 'Pricing Body', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		//--Pricing Body

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'body_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .card',
			]
		);
		$this->add_responsive_control(
			'title_align',
			[
				'label' => esc_html__( 'Alignment', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elecsen-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elecsen-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elecsen-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .card ' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Title', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		//--Title
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'title_stroke',
				'selector' => '{{WRAPPER}} .title h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .title h2',
			]
		);
		$this->add_control(
			'title_blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .title h2' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		//---Price Section

		$this->start_controls_section(
			'price_section',
			[
				'label' => esc_html__( 'Price', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'price_color',
			[
				'label' => esc_html__( 'Price Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .price h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'price_stroke',
				'selector' => '{{WRAPPER}} .price h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_shadow',
				'selector' => '{{WRAPPER}} .price h3',
			]
		);
		$this->add_control(
			'price_blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .price h3' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		//---Time Section

		$this->start_controls_section(
			'time_section',
			[
				'label' => esc_html__( 'Time', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'time_color',
			[
				'label' => esc_html__( 'Time Text Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .time h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'time_typography',
				'selector' => '{{WRAPPER}} .time h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'time_stroke',
				'selector' => '{{WRAPPER}} .time h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'time_shadow',
				'selector' => '{{WRAPPER}} .time h3',
			]
		);
		$this->add_control(
			'time_blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .time h3' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .time h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//---Text Section

		$this->start_controls_section(
			'text_section',
			[
				'label' => esc_html__( 'Text Editor', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .text p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .text p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .text p',
			]
		);
		$this->add_control(
			'text_blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .text p' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		//---Icon 

		$this->start_controls_section(
			'icons_section',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Last Background', 'elecsen-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .icon i',
			]
		);
	
			$this->add_responsive_control(
			'speaching',
			[
				'label' => esc_html__( 'Spacing', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .repeater' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->end_controls_section();

		//===Repeter Text Section

		$this->start_controls_section(
			'rep_text_section',
			[
				'label' => esc_html__( 'Icon Text', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'rep_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .repeter-text h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'rep_text_typography',
				'selector' => '{{WRAPPER}} .repeter-text h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'rep_text_stroke',
				'selector' => '{{WRAPPER}} .repeter-text h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'rep_text_shadow',
				'selector' => '{{WRAPPER}} .repeter-text h3',
			]
		);
		$this->add_control(
			'rep_text_blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .repeter-text h3' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->add_responsive_control(
			'rep_speaching',
			[
				'label' => esc_html__( 'Spacing', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .repeter-text h3' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	
		//===Button
		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				// 'global' => [
				// 	'default' => \Elementor\Global_Typography::TYPOGRAPHY_ACCENT,
				// ],
				'selector' => '{{WRAPPER}} .btn a',
				'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .btn a',
				'condition' => $args['section_condition'],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style', [
			'condition' => $args['section_condition'],
		] );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn a' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__( 'Background', 'elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .btn a',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
					'color' => [
						// 'global' => [
						// 	'default' => \Elementor\Global_Colors::COLOR_ACCENT,
						// ],
					],
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn a:hover, {{WRAPPER}} .btn a:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .btn a:hover svg, {{WRAPPER}} .btn a:focus svg' => 'fill: {{VALUE}};',
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'label' => esc_html__( 'Background', 'elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .btn a:hover, {{WRAPPER}} .btn1:focus',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .btn a:hover, {{WRAPPER}} .btn a:focus' => 'border-color: {{VALUE}};',
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
				'condition' => $args['section_condition'],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .btn a',
				'separator' => 'before',
				'condition' => $args['section_condition'],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .btn a',
				'condition' => $args['section_condition'],
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'condition' => $args['section_condition'],
			]
		);	

		$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$repe_item = $settings['list'];
		
		
		?>

		<div class="container">
			<div class="card">
				<div class="title">
					<h2><?php echo $settings['title']; ?></h2>
				</div>
				<div class="price-box d-flex">
					<div class="price">
						<h3>$<?php echo $settings['price']; ?></h3>
					</div>
					<div class="time">
						<h3><?php echo $settings['time']; ?></h3>
					</div>
				</div>
				<div class="text">
					<p><?php echo $settings['text']; ?></p>
				</div>
					<hr>
				<?php if(!empty($repe_item)) {?>
					<?php foreach($repe_item as $item) {?>
					
						<div class="repeater d-flex">
							<div class="icon">
								<i><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
							</div>
							<div class="repeter-text">
								<h3><?php echo $item['icon_title']; ?></h3>
							</div>
						</div>
							
				<?php }} ?>
				<?php
					if ( ! empty( $settings['btn_link']['url'] ) ) {
						$this->add_link_attributes( 'button_1_attr', $settings['btn_link'] );
					}
				?>
				<div class="btn">
					<a <?php echo $this->get_render_attribute_string( 'button_1_attr' ); ?>>
						<?php echo $settings['btn_title'];?>
					</a>
				</div>

			</div>
		</div>

		
		<?php
	}
}