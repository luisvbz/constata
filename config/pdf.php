<?php

return [
  'mode'                       => '',
  'format'                     => 'A4',
  'default_font_size'          => '12',
  'default_font'               => 'sans-serif',
  'margin_left'                => 10,
  'margin_right'               => 10,
  'margin_top'                 => 10,
  'margin_bottom'              => 10,
  'margin_header'              => 0,
  'margin_footer'              => 0,
  'orientation'                => 'P',
  'title'                      => 'Laravel mPDF',
  'author'                     => '',
  'watermark'                  => '',
  'show_watermark'             => false,
  'show_watermark_image'       => false,
  'watermark_font'             => 'sans-serif',
  'display_mode'               => 'fullpage',
  'watermark_text_alpha'       => 0.1,
  'watermark_image_path'       => '',
  'watermark_image_alpha'      => 0.2,
  'watermark_image_size'       => 'D',
  'watermark_image_position'   => 'P',
  'custom_font_dir'            => base_path('storage/fonts/'),
  'custom_font_data' => [
		'arial' => [
			'R'  => 'Arial-Regular.ttf',    // regular font
			'B'  => 'Arial-Black.ttf',       // optional: bold font
			// 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
			// 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
		]
		// ...add as many as you want.
  ],
  'auto_language_detection'    => false,
  'temp_dir'                   => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
  'pdfa'                       => false,
  'pdfaauto'                   => false,
  'use_active_forms'           => false,
];