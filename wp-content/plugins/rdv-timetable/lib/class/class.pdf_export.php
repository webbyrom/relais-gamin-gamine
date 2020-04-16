<?php
use Dompdf\Dompdf;
/**
 * 
 * HTML Class
 *
 * @version 1.0
 * @author  Rik de Vos
 */
class SCHED_PDF_EXPORT {

	public $schedule = true;

	function __construct($timetable_id) {
		// include SCHED_DIR.'/packages/dompdf-master/autoload.inc.php';
		$this->schedule = new SCHED_SCHEDULE();
		$this->schedule->pdf = true;
		$this->schedule->load($timetable_id);
		// def("DOMPDF_ENABLE_REMOTE", false);
	}

	function export() {

		// dd($this->schedule);
		
		$schedule = $this->schedule->render();

		ob_start();
		include SCHED_DIR.'/lib/views/schedule.pdf.php';
		$html = ob_get_contents();
		ob_end_clean();

		// instantiate and use the dompdf class
		$dompdf = new Dompdf(array('enable_remote' => true));
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		// $dompdf->setPaper('A4', 'landscape');

		// column = 175, sidebar = 112

		// $width = 140;
		// $width = $width + count($this->schedule->options['columns'])*175;
		// $height = $this->schedule->count_blocks()*40+100;

		// $customPaper = array(0,0,$width,$height);

		$dompdf->set_paper("A4", "portrait");
		// $dompdf->set_paper($customPaper);

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream();

	}

	function export_view() {
		// dd(SCHED_DIR);

		$schedule = $this->schedule->render();

		

		ob_start();
		include SCHED_DIR.'/lib/views/schedule.pdf.php';
		$html = ob_get_contents();
		ob_end_clean();

		echo  $html;
	}
}