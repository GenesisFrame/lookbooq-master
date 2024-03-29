<?php

if( ! defined( 'ABSPATH' ) ) exit;

class Lookbooq_Cuztom_Field_Term_Select extends Lookbooq_Cuztom_Field
{
	var $_supports_repeatable 	= true;
	var $_supports_ajax			= true;
	var $_supports_bundle		= true;
	
	var $dropdown;

	function __construct( $field )
	{
		parent::__construct( $field );

		$this->args = array_merge(
			array(
				'taxonomy'		=> 'category',
				'class'			=> '',
				'hide_empty'	=> 0
			),
			$this->args
		);
		
		$this->args['class'] 	.= ' cuztom-input cuztom-select cuztom-term-select';
		$this->args['echo']		= 0;
	}

	function _output( $value = null )
	{
		$this->args['name'] 	= 'cuztom' . $this->pre . '[' . $this->id . ']' . $this->after . ( $this->repeatable ? '[]' : '' );
		$this->args['id']		= $this->id . $this->after_id;
		$this->args['selected'] = ( ! empty( $this->value ) ? $this->value : $this->default_value );
		$this->dropdown 		= wp_dropdown_categories( $this->args );

		$output = $this->dropdown;

		$output .= $this->output_explanation();

		return $output;
	}
}