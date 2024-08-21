<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Elementor_Team_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'simple-team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Simple Team', 'simple-team-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'simple-team-widgets' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','simple-team-widgets'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		// Team style layout
		$this->add_control(
			'simple_team_layout',
			[
				'label' => esc_html__( 'Simple Team Style', 'simple-team-widgets' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'simple-team-style-01' => esc_html__('Simple Team Style 01','simple-team-widgets'),
				'options' => [
					'simple-team-style-01' => esc_html__( 'Team Style 01', 'simple-team-widgets' ),
					'simple-team-style-02' => esc_html__( 'Team Style 02', 'simple-team-widgets' ),
				],
			]
		);
		// Team list info
		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'simple-team-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'simple-team-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'simple-team-widgets' ),
						'label_block' => true,
					],
					
					
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'simple-team-widgets' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'simple-team-widgets' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'simple-team-widgets' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'simple-team-widgets' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$team_layout = $settings['simple_team_layout'];
		switch ($team_layout) {
			case 'simple-team-style-01':
				include(__DIR__.'/includes/simple-team-style-01.php');
				break;

			case 'simple-team-style-02':
				include(__DIR__. '/includes/simple-team-style-02.php');
				break;

			default:
				include(__DIR__. '/includes/simple-team-style-01.php');
				break;
		}

	}
}