<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'spacing-section',
        'icon' => 'el el-th-large',
		'title' => esc_html__('Spacing Setings', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Bottom Module Heading Spacing','keylin'),
        'id'               => 'bottom-module-heading-spacing',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'             => 'bk-block-heading-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'left'           => 'false',
                'right'          => 'false',
                'top'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('The Bottom Spacing of Module Heading', 'keylin'),
                'default'            => array(
                    'margin-bottom'  => '',
                    'units'          => 'px',
                )
            ),
        )
    ) );