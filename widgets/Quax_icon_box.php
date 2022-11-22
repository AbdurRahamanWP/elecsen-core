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
class Quax_icon_box extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'quax_icon_box';
    }

    public function get_title()
    {
        return __('Quax Icon Box', 'elecsen-core');
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

		//Content Section
          
		$this->start_controls_section(
			'card_section',
			[
				'label' => esc_html__( 'Content', 'elecsen-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
					'{{WRAPPER}} .card-body ' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'social_icon',
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

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Title', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'On Demand Viewing', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'elecsen-core' ),
			]
		);
		$this->add_control(
			'card_content',
			[
				'label' => esc_html__( 'Description', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'elecsen-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'elecsen-core' ),
			]
		);
		$this->add_control(
			'icon_link',
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
		$this->add_control(
			'snd_icon',
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


		$this->end_controls_section();

		//=====Icon Style===
		$this->start_controls_section(
			'icon_style_section',
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
				'label' => esc_html__( 'Background', 'elecsen-core' ),
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
					'{{WRAPPER}} .card-title h2' => 'margin-top: {{SIZE}}{{UNIT}};',
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
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'elecsen-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->end_controls_section();


		//======Title style section====
		$this->start_controls_section(
			'header_style_section',
			[
				'label' => esc_html__( 'Title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-title h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'header_typography',
				'selector' => '{{WRAPPER}} .card-title h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .card-title h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .card-title h2',
			]
		);

		$this->add_control(
			'blend_mode',
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
					'{{WRAPPER}} .card-title h2' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		
		$this->end_controls_section();

		//=======Contenet Style section=====

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => esc_html__( 'Text Editor', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-text p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .card-text p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_text_shadow',
				'selector' => '{{WRAPPER}} .card-text p',
			]
		);
		$this->end_controls_section();
		//=====Last Icon Style===
	$this->start_controls_section(
		'icons_section',
		[
			'label' => esc_html__( 'Last Icon', 'plugin-name' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_control(
		'last_icon_color',
		[
			'label' => esc_html__( 'Icon Color', 'elecsen-core' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .icons i' => 'color: {{VALUE}}',
			],
		]
	);
	$this->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name' => 'last_background',
			'label' => esc_html__( 'Last Background', 'elecsen-core' ),
			'types' => [ 'classic', 'gradient', 'video' ],
			'selector' => '{{WRAPPER}} .icons i',
		]
	);

		$this->add_responsive_control(
		'last_speaching',
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
				'{{WRAPPER}} .icons' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'last_size',
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
				'{{WRAPPER}} .icons i' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'separator' => 'before',
		]
	);
	$this->add_control(
		'padding',
		[
			'label' => esc_html__( 'Padding', 'elecsen-core' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .icons i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->end_controls_section();

	}
	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
		  <div class="container">
					<div class="card-body">
						<div class="icon">
							<i><?php \Elementor\Icons_Manager::render_icon( $settings['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
						</div>
						<div class="card-title">
								<h2><?php echo $settings['card_title']; ?></h2>
						</div>
						<div class="card-text">
							<p> <?php echo $settings['card_content']; ?></p>
						</div>
						<div class="icons">
							<i><?php \Elementor\Icons_Manager::render_icon( $settings['snd_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
						</div>
					</div>
			</div>
		

		<?php
		
	}
}
