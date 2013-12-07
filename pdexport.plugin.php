<?php

/*
Copyright (c) 2013 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. */

// require_once('dompdf/dompdf_config.inc.php'); import DOMPDF

// the PDexport class is used to export PDFs
class PDexport extends Plugin
{	
		/* public function action_init()
		{
		} */
	
		public function filter_post_content_out($content, $post)
		{
			$content = $content . $this->pdf_link($post); // setup variable to set link location
			return $content;
		}
	
        // function to insert things in template header
        public function theme_header()
        {
			Stack::add('template_stylesheet', $this->get_url() . '/style.css');
        }

        // function to insert things in template footer
        public function theme_footer()
        {
           /* if (!Stack::has('template_header_javascript', 'jquery'))
           {
               Stack::add('template_footer_javascript', Stie::get_url('scripts') . '/jquery.js', 'jquery');
           } else; */
        }

		/* public function create_pdf($post)
		{
			$this->dompdf->load_html($post->permalink); // load html contents
			$this->dompdf->render(); // render content
			$locale_string = setlocale(LC_ALL, 0);
			setlocale(LC_NUMERIC, array('en_US.UTF8', 'en_US.UTF-8',
            'en_US.8859-1', 'en_US', 'American', 'ENG', 'English'));
			$this->dompdf->render();
			setlocale(LC_ALL, $locale_string);
			$this->dompdf->stream($post->title . '.pdf'); // set filename
		} */

    	/* public function pdf_script($post)
    	{
         	$pscript = '
         	function pdf() {
         		$.get(' . $this->create_pdf($post) . ');
         		return false;
         	}';
               return $pscript;
    	} */
	
		public function pdf_link($post)
		{
			$link = '<div id="pdf"><a href="' . $this->get_url() . '/dompdf/dompdf.php?input_file=' . Controller::get_var('slug') . '&base_path=' . Site::get_url('habari') . '/" rel="nofollow">Save as PDF</a></div>';
        	// Stack::add('template_footer_javascript', array($this->pdf_script($post), 'type="text/javascript"'), 'pdfcode', 'jquery');
			return $link;
		}
		// the following sets default values upon activation
		/* public function action_plugin_activation($file)
		{
		
		} */
	
		// the following deletes options from database
		/* public function action_plugin_deactivation($file)
		{
	
		} */
	
		// the following allows plugin configuration
		/* public function configure()
		{	
		
		} */
	
} // end class
?>
