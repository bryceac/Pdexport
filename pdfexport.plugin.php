<?php

/*
Copyright (c) 2013 Bryce Campbell

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. */

require_once('dompdf/dompdf_config.inc.php'); // import DOMPDF

// the PDexport class is used to export PDFs
class PDexport extends Plugin
{
	private $dompdf;
	
	public function action_init()
	{
		$this->dompdf = new DOMPDF(); // initialize DOMPDF object
	}
	
	public function filter_post_content_out($content, $post)
	{
		$content = $content; // setup variable to set link location
		return content;
	}
	
	public function pdf_content($theme, $post)
	{
		return $this->create_pdf($post); // send post content to PDF
	}
	
	public function create_pdf($post)
	{
		$this->dompdf->load_html($post->content_out); // load html contents
		$this->dompdf->render(); // render content
		$this->stream($post->title . '.pdf'); // set filename
		
	}
	
	public function pdf_link()
	{
		$link = '<a href="">Save as PDF</a>';
		return link;
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