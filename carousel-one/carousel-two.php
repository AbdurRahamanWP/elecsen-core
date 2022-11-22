<?php
class carousel_two extends \Elementor\Widget_Base { 

	public function get_name() {
		return 'carousel_two';
	}

	public function get_title() {
		return esc_html__( 'Carousel Two', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Carousel Two','carousel','slider'];
	}

    public function get_style_depends(){
    
        return[ 'slick','slick-theme','carousel-two'];

    }


    public function get_script_depends(){
    
        return[ 'xyz-core-el-script','jquery' ];

    }

	protected function register_controls() {
//========================================================================================================== 
		$this->start_controls_section(
			'carousel_two_item_section',
			[
				'label' => esc_html__( 'Item', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'carousel_two_image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater->add_control(
			'carousel_two_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);


		$repeater->add_control(
			'carousel_two_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);


		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'carousel_two_title' => esc_html__( 'Title', 'textdomain' ),
						'carousel_two_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'carousel_two_title' => esc_html__( 'Title', 'textdomain' ),
						'carousel_two_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'carousel_two_title' => esc_html__( 'Title', 'textdomain' ),
						'carousel_two_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'carousel_two_title' => esc_html__( 'Title', 'textdomain' ),
						'carousel_two_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ carousel_two_title }}}',
			]
		);



		$this->end_controls_section();

//========================================================================================================== 
		$this->start_controls_section(
			'carousel_two_setting_section',
			[
				'label' => esc_html__( 'Setting', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'carousel_two_show_arrow',
			[
				'label' => esc_html__( 'Arrow', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => true,
				'default' => true,
			]
		);



		$this->add_control(
			'carousel_two_show_dots',
			[
				'label' => esc_html__( 'Dots', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => true,
				'default' => true,
			]
		);


		$this->add_control(
			'carousel_two_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'textdomain' ),
				'label_off' => esc_html__( 'Off', 'textdomain' ),
				'return_value' => true,
				'default' => true,
			]
		);


		$this->add_control(
			'carousel_two_autoplay_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 3000,
			]
		);


		$this->add_control(
			'carousel_two_pause_on_hover',
			[
				'label' => esc_html__( 'pauseOnHover', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'textdomain' ),
				'label_off' => esc_html__( 'Off', 'textdomain' ),
				'return_value' => true,
				'default' => true,
			]
		);



		$this->end_controls_section();




//=============================================================================================================== 
		$this->start_controls_section(
			'carousel_two_box_style_section',
			[
				'label' => esc_html__( 'Box', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'carousel_two_hover_background_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-two-image:after' => 'background-color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();



//=============================================================================================================== 
		$this->start_controls_section(
			'carousel_two_title_style_section',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'carousel_two_title_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-two-title h2' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'carousel_two_title_typography',
				'selector' => '{{WRAPPER}} .carousel-two-title h2',
			]
		);



		$this->end_controls_section();



//=============================================================================================================== 
		$this->start_controls_section(
			'carousel_two_description_style_section',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'carousel_two_description_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .carousel-two-descrithis p' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'carousel_two_description_typography',
				'selector' => '{{WRAPPER}} .carousel-two-descrithis p',
			]
		);



		$this->end_controls_section();
	

	}











	protected function render() {

        $settings = $this->get_settings_for_display();
        $carousel_two_list = $settings['list'];
		
	//========= carousel two setting============
		
		$carousel_two_setting = [];
		$carousel_two_setting['arrows'] = $settings['carousel_two_show_arrow'];
		$carousel_two_setting['dots'] = $settings['carousel_two_show_dots'];
		$carousel_two_setting['autoplay'] = $settings['carousel_two_autoplay'];
		$carousel_two_setting['autoplaySpeed'] = $settings['carousel_two_autoplay_speed'];
		$carousel_two_setting['pauseOnHover'] = $settings['carousel_two_pause_on_hover'];





		
		$carousel_two_setting_obj = json_encode($carousel_two_setting); ?>


<!-- ==================== start ========================================== -->



<div class="carousel-wrapper" data-slick='<?php echo esc_attr($carousel_two_setting_obj); ?>'>

<?php if(!empty($carousel_two_list)) {?>
<?php foreach($carousel_two_list as $item) {?>

	<div class="carousel-two-box position-relative">
        <div class="carousel-two-image">
            <?php 	echo '<img src="' . $item['carousel_two_image']['url'] . '">'; ?>
            <div class="carousel-two-content p-3 position-absolute fixed-bottom">
                <div class="carousel-two-title"> <h2><?php echo $item['carousel_two_title']; ?></h2> </div>
                <div class="carousel-two-descrithis"> <p><?php echo $item['carousel_two_description']; ?></p> </div>
            </div>
        </div>
    </div>

<?php } }?>	

</div>



<!-- ===================== end ============================================ -->
 

		<?php
	}
}